<?php

/**
 * Installation script for QuantumCMS
 * @copyright Team-Quantum
 * @license GLP v3
 */

define('INSTALLER_VERSION', '1.0');

function getVersion($commit) {
    // Load composer into json object
    $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
    $context  = stream_context_create($options);
    $composer = json_decode(
        file_get_contents(
            'https://raw.githubusercontent.com/Team-Quantum/QuantumCMS/' . $commit . '/composer.json',
            false,
            $context
        )
    );

    return property_exists($composer, 'version') ? $composer->version : 'undefined';
}

function checkVersion($version) {
    $installer = explode('.', INSTALLER_VERSION);
    $required = explode('.', $version);

    for($i = 0; $i < count($installer); $i++) {
        $a = array_key_exists($i, $installer) ? intval($installer[$i]) : 0;
        $b = array_key_exists($i, $required) ? intval($required[$i]) : 0;
        if($a > $b) {
            return true;
        } else if($a < $b) {
            return false;
        }
    }

    return true;
}

function step1() {
    $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
    $context  = stream_context_create($options);
    $branches = json_decode(
        file_get_contents('https://api.github.com/repos/Team-Quantum/QuantumCMS/branches', false, $context)
    );

    echo '<b>Please select the branch you want to install:</b><br /><br />';
    echo '<form method="get">';
    echo '<select name="branch">';
    foreach($branches as $branch) {
        echo '<option value="' . $branch->name . '">' .
            $branch->name . ' (' . getVersion($branch->commit->sha) . ')' .
            '</option>';
    }
    echo '</select><br /><br />';
    echo '<input type="hidden" name="step" value="2" />';
    echo '<input class="btn btn-default" type="submit" value="Download" />';
    echo '</form>';
}

function step2() {
    $branch = $_GET['branch'];

    if(!file_exists($branch . '.zip')) {
        file_put_contents($branch . '.zip',
            fopen('https://github.com/Team-Quantum/QuantumCMS/archive/' . $branch . '.zip', 'r'));
    }

    header('Location: install.php?step=3&branch=' . $branch);
}

/**
 * Update install.php
 */
function step3a() {
    $branch = $_GET['branch'];
    $dirName = 'QuantumCMS-' . $branch . '/';

    $archive = new ZipArchive();
    if($archive->open($branch . '.zip') === true) {
        $fp = $archive->getStream($dirName . 'install/install.php');
        if(!$fp) {
            echo '<b>Invalid ZIP File. Please try again later or contact Team-Quantum.</b>';
        } else {
            file_put_contents('install.php', $fp);
            header('Location: install.php?step=3&branch=' . $branch);
        }
    } else {
        echo '<b>Error while downloading repository, please try again later.</b>';
    }
}

/**
 * Check version of installer and go to first install.json step
 */
function step3() {
    $branch = $_GET['branch'];
    $dirName = 'QuantumCMS-' . $branch . '/';

    $archive = new ZipArchive();
    if($archive->open($branch . '.zip') === true) {
        $fp = $archive->getStream($dirName . 'install.json');
        if(!$fp) {
            echo '<b>Invalid ZIP File. Please try again later or contact Team-Quantum.</b>';
        } else {
            file_put_contents('install.json', $fp);
            $installDetails = json_decode(file_get_contents('install.json'));
            if(!checkVersion($installDetails->installer)) {
                echo '<b>This installer is too old for installing the selected branch.</b><br /><br />';
                echo '<form method="get">';
                echo '<input class="btn btn-default" type="submit" value="Update install.php" />';
                echo '<input type="hidden" name="step" value="3a" />';
                echo '<input type="hidden" name="branch" value="' . $branch . '" />';
                echo '</form>';
            } else {
                header('Location: install.php?step=4&branch=' . $branch);
            }
        }

    } else {
        echo '<b>Error while downloading repository, please try again later.</b>';
    }
}

function createFieldText($name, $details) {
    $default = @$details->{'default'};
    $isPassword = @$details->{'password'} === true;

    $type = $isPassword ? 'password' : 'text';

    echo '<div class="input-group">';
    echo '<span class="input-group-addon">' . $details->{'name'} . '</span>';
    echo '<input class="form-control" type="' . $type . '" name="' . $name . '" value="' . $default . '" />';
    echo '</div><br />';
}

function createFieldCheckBox($name, $details) {
    $default = @$details->{'default'};
    $trueValue = @$details->{'true_value'};

    echo '<div class="input-group">';
    echo '<span class="input-group-addon"><input type="checkbox" name="' . $name . '" ';
    if($default === true) echo 'checked ';
    if($trueValue != '') echo 'value="' . $trueValue . '" ';
    echo '/></span>';
    echo '<span class="form-control">' . $details->{'name'} . '</span>';
    echo '</div><br />';
}

function createFieldHidden($name, $details) {
    echo '<input type="hidden" name="' . $name . '" value="' . $details->{'value'} . '" />';
}

function createCategory($name, $details) {
    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">' . $details->{'name'} . '</h3>';
    echo '</div>';
    echo '<div class="panel-body">';

    foreach($details->{'children'} as $entry) {
        $fieldName = $entry[0];
        $fieldDetails = $entry[1];

        createField($name . '::' . $fieldName, $fieldDetails);
    }

    echo '</div>';
    echo '</div>';
}

function createField($name, $details) {
    switch($details->{'type'}) {
        case 'text':
            createFieldText($name, $details);
            break;
        case 'checkbox':
            createFieldCheckBox($name, $details);
            break;
        case 'hidden':
            createFieldHidden($name, $details);
            break;
        case 'category':
            createCategory($name, $details);
            break;
    }
}

/**
 * Create configuration dialog from .json file
 */
function step4() {
    $branch = $_GET['branch'];
    $installDetails = json_decode(file_get_contents('install.json'));

    // Create dialog
    echo '<form method="post" action="?step=5">';
    foreach($installDetails->configuration as $entry) {
        $fieldName = $entry[0];
        $fieldDetails = $entry[1];

        createField($fieldName, $fieldDetails);
    }
    echo '<input type="hidden" name="branch" value="' . $branch . '" />';
    echo '<input type="submit" class="btn btn-default" value="Install" />';
    echo '</form>';
}

function assign(&$array, $keys, $value) {
    $lastKey = array_pop($keys);
    $tmp = &$array;
    foreach($keys as $key) {
        if(!isset($tmp[$key]) || !is_array($tmp[$key])) {
            $tmp[$key] = array();
        }
        $tmp = &$tmp[$key];
    }
    $tmp[$lastKey] = $value;
    unset($tmp);
}

function toPHP($name, $value) {
    if(is_string($value)) {
        return "'" . $name . "' => '" . $value . "'," . PHP_EOL;
    }
    if(is_array($value)) {
        $ret = "'" . $name . "' => [" . PHP_EOL;
        foreach($value as $key => $value2) {
            $ret .= toPHP($key, $value2);
        }
        $ret .= '], // <-- ' . $name . PHP_EOL;
        return $ret;
    }
    return "'" . $name . "' => ''" . PHP_EOL;
}

/**
 * Create the config.php file
 */
function step5() {
    $branch = $_POST['branch'];
    $blackList = array('branch');

    $config = '<?php' . PHP_EOL . PHP_EOL . 'return [' . PHP_EOL;
    $configArray = array();

    foreach($_POST as $key => $value) {
        if(in_array($key, $blackList)) {
            continue;
        }

        $split = array_filter(explode('::', $key));
        assign($configArray, $split, $value);
    }

    foreach($configArray as $key => $value) {
        $config .= toPHP($key, $value);
    }

    $config .= '];';

    $file = fopen('config.php', 'w+');
    fwrite($file, $config);
    fclose($file);

    header('Location: install.php?step=6&branch=' . $branch);
}

function recurse_copy($source, $destination) {
    $dir = opendir($source);
    @mkdir($destination);
    while(false !== ($file = readdir($dir))) {
        if($file != '.' && $file != '..') {
            if(is_dir($source . '/' . $file)) {
                recurse_copy($source . '/' . $file, $destination . '/' . $file);
            } else {
                copy($source . '/' . $file, $destination . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function recurse_delete($directory) {
    $dir = opendir($directory);
    while(false !== ($file = readdir($dir))) {
        if($file != '.' && $file != '..') {
            if(is_dir($directory . '/' . $file)) {
                recurse_delete($directory . '/' . $file);
            } else {
                unlink($directory . '/' . $file);
            }
        }
    }
    closedir($dir);
    rmdir($directory);
}

function runComposer() {
    $composerPhar = new Phar("composer.phar");
    $composerPhar->extractTo('./');

    require_once('./vendor/autoload.php');

    $input = new \Symfony\Component\Console\Input\ArrayInput(array('command' => 'update'));
    $app = new \Composer\Console\Application();
    $app->run($input);
}

/**
 * Unpack the cms and call own installer
 */
function step6() {
    $branch = $_GET['branch'];

    $archive = new ZipArchive();
    if($archive->open($branch . '.zip') === true) {
        if($archive->extractTo('./') === false) {
            echo 'Failed to extract ZIP File. Maybe write permissions missing?';
        } else {
            recurse_copy('QuantumCMS-' . $branch, '.');
            recurse_delete('QuantumCMS-' . $branch);

            runComposer();

            // Delete files which are listed in install.json
            $installDetails = json_decode(file_get_contents('install.json'));
            $removeFiles = $installDetails->{'removeAfterInstall'};
            foreach($removeFiles as $file) {
                unlink($file);
            }

            $redirectTo = $installDetails->{'redirectTo'};
            header('Location: ' . $redirectTo);

            echo 'Done';
        }
    } else {
        echo 'ZIP-File is gone :(';
    }
}

function build_header() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head><title>QuantumCMS - Installation</title>';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';
    echo '</head>';
    echo '<body style="padding-top: 60px; margin-bottom: 65px;">';
    echo '<nav class="navbar navbar-inverse navbar-fixed-top">';
    echo '<div class="container">';
    echo '<div class="navbar-header">';
    echo '<a class="navbar-brand" href="#">QuantumCMS</a>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';
    echo '<div class="container">';
}

function build_footer() {
    echo '</div>';
    echo '<footer style="position: fixed; bottom: 0; width: 100%; height: 60px; background-color: #f5f5f5; z-index: 100;">';
    echo '<div class="container">';
    echo '<p style="margin: 20px 0; color: #777;">&copy; ' . date('Y') . ' Team-Quantum (Install Version: ' . INSTALLER_VERSION . ')</p>';
    echo '</div>';
    echo '</footer>';
    echo '</body>';
    echo '</html>';
}

build_header();
if(!array_key_exists('step', $_GET)) {
    step1();
} else {
    $funcName = 'step' . $_GET['step'];
    $funcName();
}
build_footer();