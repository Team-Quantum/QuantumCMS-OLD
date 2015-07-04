<?php

namespace Quantum\pages;

use Quantum\Core;

abstract class ProtectedPage implements IPage {

    /**
     * @var boolean
     */
    private $rights = false;

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public abstract function preRenderI($core, $smarty);

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public abstract function getTemplateI($core, $smarty);

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public abstract function postRenderI($core, $smarty);

    /**
     * Returns the needed privilege if this is null then only logged in will check
     * @param $core Core
     * @return string|null
     */
    public abstract function getNeededPrivilege($core);

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        // Check logged in
        if($core->getAccount() != null) {
            $neededPrivilege = $this->getNeededPrivilege($core);

            if($neededPrivilege == null) {
                $this->rights = true;
            } else {
                $this->rights = $core->getUserManager()->hasPrivilege($neededPrivilege);
            }
        }

        if($this->rights)
            $this->preRenderI($core, $smarty);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        if($this->rights)
            return $this->getTemplateI($core, $smarty);

        return '404.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty) {
        if($this->rights)
            $this->postRenderI($core, $smarty);
    }


}