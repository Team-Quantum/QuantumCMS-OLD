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
     * @var DatabaseManager
     */
    private $internalDatabase;

    /**
     * @var array(DatabaseManager)
     */
    private $serverDatabase;

    /**
     * @var Core
     */
    private static $instance;

    /**
     * Core constructor.
     */
    public function __construct() {
        $this->initDefines();
        $this->initExceptionHandler();
        $this->initSmarty();
        $this->initConfiguration();
        $this->initDatabases();

        Core::$instance = $this;
    }

    /**
     * Handle the request. Do actions and display the page.
     */
    public function execute() {
        // Only for development:
        $this->internalDatabase->createStructure();

        $this->smarty->assign('system_pageTitle', 'Test');
        $this->smarty->assign('system_slogan', 'No Slogan');
        $this->smarty->assign('system_year', date('Y'));
        $this->smarty->assign('system_path', $this->settings['external_path']);

        $this->smarty->display('index.tpl');
    }

    public static function getInstance() {
        return Core::$instance;
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

    private function initDatabases() {
        $this->internalDatabase = new DatabaseManager($this->settings['internal_database'], ROOT_DIR . 'mappings' . DS . 'internal' . DS);
    }

    private function initExceptionHandler() {
        new ExceptionHandler();
    }

}