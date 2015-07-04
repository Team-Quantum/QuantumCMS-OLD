<?php

namespace Quantum\Pages\Admin;

use Quantum\Core;
use Quantum\pages\IPage;
use Quantum\pages\ProtectedPage;

class Home extends ProtectedPage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRenderI($core, $smarty) {
        // TODO: Implement preRender() method.
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplateI($core, $smarty) {
        return 'pages/admin/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRenderI($core, $smarty) {
        // TODO: Implement postRender() method.
    }

    /**
     * Returns the needed privilege if this is null then only logged in will check
     * @param $core Core
     * @return string|null
     */
    public function getNeededPrivilege($core) {
        return 'system_admin';
    }
}