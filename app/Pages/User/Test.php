<?php
namespace App\Pages\User;

use Quantum\BasePage;
use Quantum\Core;
use Quantum\DBO\Player;
use Quantum\ProtectablePage;
use Quantum\Translator;

class Test extends BasePage {
    use ProtectablePage;
    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty) {

    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return '404.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

}