<?php

/**
 * Installation script for QuantumCMS
 * @copyright Team-Quantum
 * @license GLP v3
 */

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
    echo '<input type="submit" value="Download" />';
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

function step3() {
    $branch = $_GET['branch'];

    $archive = new ZipArchive();
    if($archive->open($branch . '.zip') === true) {
        for($i = 0; $i < $archive->numFiles; $i++) {
            echo $archive->getNameIndex($i) . '<br />';
        }
        echo 'OK';
    } else {
        echo 'Fehler';
    }
}

function build_header() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head><title>QuantumCMS - Installation</title>';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';
    echo '</head>';
    echo '<body>';
}

function build_footer() {
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