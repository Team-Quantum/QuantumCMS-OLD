<?php

namespace App\Pages;

use Quantum\Authorization;
use Quantum\ContainerPage;

class Admin extends ContainerPage {
    use Authorization;

    private $neededPrivileges = 'system_admin';

    public function preRender($core, $smarty) {
        // Build menu (key = page, value = display name)
        $menu = [
            "Home" => "Dashboard",
            "Accounts" => "Accounts",
            "Characters" => "Characters",
            "Guilds" => "Guilds",
        ];

        // Assign smarty variables for the menu
        $smarty->assign('system_admin_menu', $menu);

        // Overwrite default index.tpl
        $core->setMainTemplate('admin.tpl');
    }

}