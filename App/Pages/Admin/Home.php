<?php

namespace App\Pages\Admin;
//namespace System\Sniffer;

use Quantum\BasePage;
use Quantum\Core;
use Smarty;
use phpSniff;


class Home extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Home');
        $smarty->assign('system_admin_title', 'Home');

        // TODO: show webserver information
        $smarty->assign('admin_server_info', $this->showServer());
        // TODO: show session information
        $smarty->assign('admin_session_info', $this->showSession());
        // TODO: show cookie information
        $smarty->assign('admin_cookie_info', $this->showCookie());
        // TODO: show usage statistics

        // TODO: show user information
        //$smarty->assign('user_info', $this->returnSniffer());

        //$obj = new phpSniff; // erzeugt ein Objekt der Klasse My\Full\Classname
        //NSname\subns\func(); // ruft die Funktion My\Full\NSname\subns\func auf

        //$smarty->assign('admin_user_info', require_once('System\'));
        
        // TODO: show server statistics


    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

    private function showServer(){
        return $_SERVER;
    }

    private function showCookie(){
        return $_COOKIE;
    }

    private function showSession(){
        return $_SESSION;
    }

}