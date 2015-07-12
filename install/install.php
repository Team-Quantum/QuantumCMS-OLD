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
            }
        }

    } else {
        echo '<b>Error while downloading repository, please try again later.</b>';
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
    echo '<footer style="position: fixed; bottom: 0; width: 100%; height: 60px; background-color: #f5f5f5;">';
    echo '<div class="container">';
    echo '<p style="margin: 20px 0; color: #777;">&copy; ' . date('Y') . ' Team-Quantum</p>';
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