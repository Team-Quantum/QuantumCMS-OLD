<?php

namespace Quantum\pages;

use Quantum\Core;

class ContainerPage implements IPage {

    /**
     * @var string
     */
    private $directory;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $default;

    /**
     * @var IPage
     */
    private $page;

    /**
     * @param string $directory
     * @param string $namespace
     * @param string $default
     */
    public function __construct($directory, $namespace, $default = 'Home') {
        $this->directory = $directory;
        $this->namespace = $namespace;
        $this->default = $default;
    }

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @throws \Exception
     */
    public function preRender($core, $smarty) {
        // Load admin page
        $query = array_key_exists('q', $_GET) ? $_GET['q'] : '';
        $path = explode('/', $query);
        $page = $this->default;
        if(strlen($query) > 1) {
            $page = $path[1];
        }

        // Import file
        if(file_exists($this->directory . $page)) {
            require_once($this->directory . $page);
        }

        $pageFullName = $this->namespace . $page;
        if(!class_exists($pageFullName)) {
            $this->page = null;
            return;
        }

        /** @var $pageClass IPage */
        $pageClass = new $pageFullName();
        if(!($pageClass instanceof IPage)) {
            throw new \Exception("Page '" . $pageFullName . "' is invalid.'");
        }
        $this->page = $pageClass;

        $pageClass->preRender($core, $smarty);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        if($this->page == null)
            return '404.tpl';
        else
            return $this->page->getTemplate($core, $smarty);
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty) {
        if($this->page != null)
            $this->page->postRender($core, $smarty);
    }
}