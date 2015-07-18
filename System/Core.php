<?php

namespace Quantum;

use Quantum\DBO\Account;
use Quantum\Exceptions\NotFoundException;

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
     * @var UserManager
     */
    private $userManager;

    /**
     * @var ExceptionHandler
     */
    protected $exceptionHandler;

    /**
     * @var string
     */
    protected $mainTemplate = 'index.tpl';

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
        $this->initUserManager();
        $this->initPlugins();
        $this->initApp();

        Core::$instance = $this;
    }

    /**
     * Handle the request. Do actions and display the page.
     */
    public function execute() {
        // Only for development:
        $this->internalDatabase->createStructure();

        $this->smarty->debugging = $this->settings['in_dev'];

        $this->smarty->assign('system_pageTitle', 'Team Quantum');
        $this->smarty->assign('system_slogan', 'Quantum CMS <3');
        $this->smarty->assign('system_year', date('Y'));
        $this->smarty->assign('system_path', $this->settings['external_path']);
        $this->smarty->assign('system_currentUser', $this->getAccount());
        $this->smarty->assign('system_userManager', $this->getUserManager());
        $this->smarty->assign('system_date', date('d-m-Y'));
        $this->smarty->assign('system_time', date('H:i:s'));

        $uri = $this->prepareUri();
        $path = explode('/', $uri);
        $page = $this->settings['default_page'] ?: 'Home';

        if(count($path) > 0 && $uri !== '') {
            $page = $path[0];
        }

        $pageFullName = "\\App\\Pages\\" . $page;

        if(!class_exists($pageFullName)) {
            throw new NotFoundException;
        }
        /** @var $pageObject BasePage */
        $pageObject = new $pageFullName();

        if(!($pageObject instanceof BasePage)) {
            throw new NotFoundException;
        }

        $pageObject->setSmarty($this->smarty);
        $pageObject->setCore($this);
        $pageObject->setArgs($path);

        $this->doAuthorization($pageObject);

        /** Container pages allows us to create sub-pages */
        if ($pageObject instanceof ContainerPage) {
            $pageFullName = $pageFullName . '\\' . (isset($path[1]) ? $path[1] : '');
            if (! class_exists($pageFullName)) {
                throw new NotFoundException;
            }

            $pageObject->preRender($this, $this->smarty);

            array_shift($path);
            $pageObject = new $pageFullName;
            $this->doAuthorization($pageObject);
        }

        array_shift($path);

        $pageObject->setSmarty($this->smarty);
        $pageObject->setCore($this);
        $pageObject->setArgs($path);

        if ($pageObject instanceof Controller) {
            // The big deal begins

            $action = isset($path[0]) ? $path[0] : '';

            array_shift($path);
            $pageObject->setArgs($path);

            if (method_exists($pageObject, $action)) {
                $layout = 'index.tpl';

                $result = $pageObject->$action();

                if (stripos($result, ':') !== false) {
                    list($layout, $template) = explode(':', $result);
                } else {
                    $template = $result;
                }

                $this->smarty->assign('pageTemplate', $template);
                $this->smarty->display($layout);
            } else {
                $pageObject->_404();
            }
            return;
        }


        $this->renderPage($pageObject);
    }

    /**
     * Render page
     *
     * @param BasePage $page
     */
    protected function renderPage(BasePage $page)
    {
        $page->preRender($this, $this->smarty);
        $this->smarty->assign('pageTemplate', $page->getTemplate($this, $this->smarty));
        // Process sidebars
        PluginManager::processSidebars($this, $this->smarty);
        $this->smarty->display($this->mainTemplate);
        $page->postRender($this, $this->smarty);
    }

    /**
     * Prepare uri for page routing
     *
     * @return string
     */
    protected function prepareUri()
    {
        $query = $this->getPathInfo();

        $basePath = $this->settings['base_path'];
        // Cut / from begin and end
        if($basePath[0] == '/') {
            $basePath = substr($basePath, 1);
        }
        if($basePath[strlen($basePath) - 1] == '/') {
            $basePath = substr($basePath, 0, strlen($basePath) - 1);
        }

        $query = str_replace($basePath, '', $query);

        return trim($query, '/');
    }

    /**
     * Do authorization for a page
     *
     * @param BasePage $page
     */
    protected function doAuthorization(BasePage $page)
    {
        if (method_exists($page, 'authorize')) {
            if ( ! $page->authorize($this)) {
                $page->redirectTo('');
                exit;
            }
        }
    }

    /**
     * Throw page not found
     */
    public function displayNotFound()
    {
        $this->smarty->assign('pageTemplate', '404.tpl');
        $this->smarty->display('index.tpl');
        exit;
    }

    /**
     * Run all cron jobs which are needed
     */
    public function executeCronJobs() {
        PluginManager::processCronJobs($this);
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

        if (!defined('APP_DIR')) {
            define('APP_DIR', ROOT_DIR . 'App' . DS);
        }

        if (!defined('STORAGE_DIR')) {
            define('STORAGE_DIR', ROOT_DIR . 'Storage' . DS);
        }
    }

    /**
     * Initialise the template system
     */
    private function initSmarty() {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir(APP_DIR.'templates');
        $this->smarty->setCompileDir(STORAGE_DIR.'compiled');

        $pluginDirectories = $this->smarty->getPluginsDir();
        $pluginDirectories[] = SYSTEM_DIR . 'Smarty';
        $this->smarty->setPluginsDir($pluginDirectories);
    }

    /**
     * Loads the configuration file
     */
    private function initConfiguration() {
        if(!file_exists(ROOT_DIR . 'config.php')) {
            exit('No config.php found.'); // todo redirect to install
        }

        $this->settings = require ROOT_DIR . 'config.php';
        $this->settings['external_path'] = $this->detectBaseUrl();
    }

    private function initDatabases() {
        $mappingsPath = ROOT_DIR.'mappings'.DS;

        $internalMappings =  $mappingsPath.'internal'.DS;
        $accountMappings = $mappingsPath.'account' . DS;
        $playerMappings = $mappingsPath.'player' . DS;

        $this->internalDatabase = new DatabaseManager($this->settings['internal_database'], $internalMappings);

        $env = $this->inDev() ? 'dev' : 'production';

        $accountDbSettings = $this->settings['server_database'][$env]['account'];
        $playerDbSettings =  $this->settings['server_database'][$env]['player'];

        $this->serverDatabase = [];
        $this->serverDatabase['account'] = new DatabaseManager($accountDbSettings, $accountMappings);
        $this->serverDatabase['player'] = new DatabaseManager($playerDbSettings, $playerMappings);
    }

    private function initExceptionHandler() {
        $this->exceptionHandler = new ExceptionHandler($this);

        $this->addException('\Quantum\Exceptions\NotFoundException', function (Core $core) {
            $core->displayNotFound();
        });
    }

    private function initTranslator() {
        $this->translator = new Translator('DE', $this->internalDatabase);
    }

    /**
     * Init app
     */
    private function initApp()
    {
        $core =& $this;
        require APP_DIR . 'init.php';
    }

    /**
     * Push error to be cached
     *
     * @param $class
     * @param callable $closure
     */
    public function addException($class, \Closure $closure)
    {
        $this->exceptionHandler->pushError($class, $closure);
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
        if($this->settings['in_dev'])
            return '';

        return '<script src="https://www.google.com/recaptcha/api.js"></script>' .
                '<div class="g-recaptcha" data-sitekey="' . $this->settings['recaptcha']['public'] . '"></div>';
    }

    /**
     * Check if the captcha was solved
     * @return boolean
     */
    public function validateCaptcha() {
        if($this->settings['in_dev']) {
            return true;
        }

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

    private function addMessage($type, $message, array $format = array()) {
        $messages = $this->smarty->getTemplateVars($type);
        if($messages === null) {
            $messages = array();
        }
        $message = $this->translator->translate($message);
        foreach($format as $key => $value) {
            $message = str_replace('%'.$key.'%', $value, $message);
        }

        $messages[] = $message;
        $this->smarty->assign($type, $messages);
    }

    public function addError($message, array $format = array()) {
        $this->addMessage('errors', $message, $format);
    }

    public function addInfo($message, array $format = array()) {
        $this->addMessage('info', $message, $format);
    }

    public function addSuccess($message, array $format = array()) {
        $this->addMessage('success', $message, $format);
    }

    /**
     * Create the hash value from the clean text (use this function because this can be overwritten by plugins)
     * @param $clean
     * @param $source mixed On Login its an \Quantum\DBO\Account use this source if the hash contains a seed
     * @return string hash value
     */
    public function createHash($clean, $source) {
        // todo implement plugin possibility to override this

        // Default MySQL5 Hash implementation
        return '*' . strtoupper(sha1(sha1($clean, true)));
    }

    /**
     * Sets the current login into the session
     * @param $account Account
     */
    public function setAccount($account) {
        $this->userManager->setAccount($account);
    }

    /**
     * Gets the current logged in user
     * @return null|Account
     */
    public function getAccount() {
        return $this->userManager->getCurrentAccount();
    }

    /**
     * Get path info from path_info env variable or from url
     *
     * @return string
     */
    public function getPathInfo()
    {
        static $pathInfo;

        if ($pathInfo == null) {
            if (isset($_SERVER['PATH_INFO'])) {
                $pathInfo = $_SERVER['PATH_INFO'];
            } else {
                $query = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
                $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
                $pathInfo = rtrim(str_replace('?'.$query, '', $uri), '/');
            }
        }
        return $pathInfo;
    }

    private function initPlugins() {
        PluginManager::load($this);
    }

    private function initUserManager() {
        $this->userManager = new UserManager($this);
    }

    public function getUserManager() {
        return $this->userManager;
    }

    /**
     * Expose the settings to the other classes
     *
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return bool
     */
    public function inDev() {
        return $this->settings['in_dev'] == true;
    }

    /**
     * Autodetect base url
     *
     * @return mixed
     */
    protected function detectBaseUrl()
    {
        $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $base_url .= '://'. $_SERVER['HTTP_HOST'];
        $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $base_url;
    }

    /**
     * @return string
     */
    public function getMainTemplate() {
        return $this->mainTemplate;
    }

    /**
     * @param string $mainTemplate
     */
    public function setMainTemplate($mainTemplate) {
        $this->mainTemplate = $mainTemplate;
    }

}