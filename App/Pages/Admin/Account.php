<?php

namespace App\Pages\Admin;

use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Account extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        if(count($this->args) == 0) {
            $smarty->assign('account_found', false);
            return;
        }

        $accountName = $this->args[0];
        $em = $core->getServerDatabase('account')->getEntityManager();
        $account = $em->getRepository('\\Quantum\\DBO\\Account')->findOneBy(array('login' => $accountName));
        if($account == null) {
            $smarty->assign('account_found', false);
            return;
        }

        $smarty->assign('system_admin_account', $account);
        $smarty->assign('account_found', true);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/account.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {
        // TODO: Implement postRender() method.
    }
}