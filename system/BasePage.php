<?php
namespace Quantum;

use Smarty;

abstract class BasePage {

    /**
     * Smarty object
     *
     * @var Smarty
     */
    protected $smarty;

    /**
     * Core object
     *
     * @var Core
     */
    protected $core;

    /**
     * Args (from the url)
     *
     * @var array
     */
    protected $args = [];

    /**
     * Inject smarty to the page
     *
     * @param $smarty
     */
    public function setSmarty(Smarty $smarty)
    {
        $this->smarty = $smarty;
    }

    /**
     * Inject the core
     *
     * @param Core $core
     */
    public function setCore(Core $core)
    {
        $this->core = $core;
    }

    /**
     * Set the args for the page
     *
     * @param array $args
     */
    public function setArgs(array $args)
    {
        $this->args = $args;
    }

    /**
     * Redirect to a location
     *
     * @param $url
     */
    protected function redirect($url)
    {
        header(sprintf('Location: %s', $url));
        exit;
    }

    /**
     * Redirect to a specific page
     *
     * @param $page
     */
    protected function redirectTo($page)
    {
        header('Location: ' . $this->core->getSettings()['external_path'] . $page);
        exit;
    }

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public abstract function preRender($core, $smarty);

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public abstract function getTemplate($core, $smarty);

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public abstract function postRender($core, $smarty);
}