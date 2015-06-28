<?php

namespace Quantum;

use Quantum\pages\IPage;

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
     * @var Translator
     */
    private $translator;

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
        $this->initTranslator();

        Core::$instance = $this;
    }

    /**
     * Handle the request. Do actions and display the page.
     */
    public function execute() {
        // Only for development:
        $this->internalDatabase->createStructure();

        $this->smarty->assign('system_pageTitle', 'Team Quantum');
        $this->smarty->assign('system_slogan', 'Quantum CMS <3');
        $this->smarty->assign('system_year', date('Y'));
        $this->smarty->assign('system_path', $this->settings['external_path']);
        $this->smarty->assign('system_currentUser', null);

        // Read query param
        $query = array_key_exists('q', $_GET) ? $_GET['q'] : '';
        $path = explode('/', $query);
        $page = 'Home';
        if(strlen($query) > 0) {
            $page = $path[0];
        }

        $pageFullName = "\\Quantum\\Pages\\" . $page;
        if(!class_exists($pageFullName)) {
            $this->smarty->assign('pageTemplate', '404.tpl');
            $this->smarty->display('index.tpl');
            return;
        }
        /** @var $pageClass IPage */
        $pageClass = new $pageFullName();
        if(!($pageClass instanceof IPage)) {
            throw new \Exception("Page '" . $pageFullName . "' is invalid.'");
        }

        $pageClass->preRender($this, $this->smarty);
        $this->smarty->assign('pageTemplate', $pageClass->getTemplate($this, $this->smarty));

        $this->smarty->display('index.tpl');

        $pageClass->postRender($this, $this->smarty);
    }

    /**
     * @return Translator
     */
    public function getTranslator() {
        return $this->translator;
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

        $pluginDirectories = $this->smarty->getPluginsDir();
        $pluginDirectories[] = SYSTEM_DIR . 'smarty';
        $this->smarty->setPluginsDir($pluginDirectories);
    }

    /**
     * Loads the configuration file
     */
    private function initConfiguration() {
        require_once(ROOT_DIR . 'config.php');
        $this->settings = $settings;
    }

    private function initDatabases() {
        $this->internalDatabase = new DatabaseManager($this->settings['internal_database'],
            ROOT_DIR . 'mappings' . DS . 'internal' . DS);

        $this->serverDatabase = array();
        $this->serverDatabase['account'] = new DatabaseManager($this->settings['server_database']['account'],
            ROOT_DIR . 'mappings' . DS . 'account' . DS);
        $this->serverDatabase['player'] = new DatabaseManager($this->settings['server_database']['player'],
            ROOT_DIR . 'mappings' . DS . 'player' . DS);
    }

    private function initExceptionHandler() {
        new ExceptionHandler();
    }

    private function initTranslator() {
        $this->translator = new Translator('DE', $this->internalDatabase);
    }

    /**
     * Returns the database manager for the database given
     * @param $type string Database type (player, account, log)
     * @return DatabaseManager
     */
    public function getServerDatabase($type) {
        return $this->serverDatabase[$type];
    }

    /**
     * @return DatabaseManager
     */
    public function getInternalDatabase() {
        return $this->internalDatabase;
    }

    /**
     * Generates html code which display recaptcha
     * @return string
     */
    public function getRecaptchaHtml() {
        return '<script src="https://www.google.com/recaptcha/api.js"></script>' .
                '<div class="g-recaptcha" data-sitekey="' . $this->settings['recaptcha']['public'] . '"></div>';
    }

    /**
     * Check if the captcha was solved
     * @return boolean
     */
    public function validateCaptcha() {
        $recaptchURL = 'https://www.google.com/recaptcha/api/siteverify';
        $secret = $this->settings['recaptcha']['private'];
        $data = array(
            'secret' => $secret,
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        );
        $request = array(
            'http' => array(
                'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($request);
        $result = file_get_contents($recaptchURL, false, $context);
        $json = json_decode($result);
        return $json->{'success'} == 1;
    }

    public function addError($message) {
        $errors = $this->smarty->getTemplateVars('errors');
        if($errors === null) {
            $errors = array();
        }
        $errors[] = $this->translator->translate($message);
        $this->smarty->assign('errors', $errors);
    }

}