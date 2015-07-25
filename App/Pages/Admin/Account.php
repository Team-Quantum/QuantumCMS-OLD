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
        $em2 = $core->getServerDatabase('player')->getEntityManager();

        $account = $em->getRepository('\\Quantum\\DBO\\Account')->findOneBy(array('login' => $accountName));
        if($account == null) {
            $smarty->assign('account_found', false);
            return;
        }

        $characters = $em2->getRepository('\\Quantum\\DBO\\Player')->findBy(array('account_id' => $account->getId()));

        $smarty->assign('system_admin_title', 'Account - ' . $account->getLogin());
        $smarty->assign('system_admin_menu_active', 'Accounts');
        $smarty->assign('system_admin_account', $account);
        $smarty->assign('system_admin_characters', $characters);
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