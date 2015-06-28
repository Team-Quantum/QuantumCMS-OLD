<?php

namespace Quantum\Pages;

use Quantum\Core;

class Login implements IPage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        if($_POST['action'] == 'system-login') {
            if($core->validateCaptcha()) {

            } else {
                $core->addError('system.errors.captcha');
            }
        }
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
       return 'pages/login.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
        // TODO: Implement postRender() method.
    }
}