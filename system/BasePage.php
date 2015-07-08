<?php
namespace Quantum;

abstract class BasePage {

    protected $smarty;
    protected $core;

    /**
     * Prepare the page to be processed
     *
     * @param array $objects
     */
    public function inject(array $objects)
    {
        foreach ($objects as $name => $object) {
            $this->$name = $object;
        }
    }

    /**
     * Redirect to a location
     *
     * @param $url
     */
    protected function redirect($url)
    {
        header(sprintf('Location: %s'));
        exit;
    }

    protected function redirectTo($page)
    {

    }

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public abstract function preRender($core, $smarty);

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public abstract function getTemplate($core, $smarty);

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public abstract function postRender($core, $smarty);
}