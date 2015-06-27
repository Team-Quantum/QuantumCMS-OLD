<?php

namespace Quantum;

class Core {

    /**
     * @var \Smarty
     */
    private $smarty;

    /**
     * @var array
     */
    private $settings;

    /**
     * Core constructor.
     */
    public function __construct() {
        $this->initDefines();
        $this->initSmarty();
        $this->initConfiguration();
    }

    /**
     * Handle the request. Do actions and display the page.
     */
    public function execute() {
        $this->smarty->assign('system_pageTitle', 'Test');
        $this->smarty->assign('system_slogan', 'No Slogan');
        $this->smarty->assign('system_year', date('Y'));
        $this->smarty->assign('system_path', $this->settings['external_path']);

        $this->smarty->display('index.tpl');
    }

    private function initDefines() {
        if(!defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }

        if(!defined('SYSTEM_DIR')) {
            define('SYSTEM_DIR', dirname(__FILE__) . DS);
        }

        if(!defined('ROOT_DIR')) {
            define('ROOT_DIR', realpath(SYSTEM_DIR . '..') . DS);
        }
    }

    /**
     * Initialise the template system
     */
    private function initSmarty() {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir('templates');
        $this->smarty->setCompileDir('templates/compiled');
    }

    /**
     * Loads the configuration file
     */
    private function initConfiguration() {
        require_once(ROOT_DIR . 'config.php');
        $this->settings = $settings;
    }

}