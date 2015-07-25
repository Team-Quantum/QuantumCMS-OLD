<?php

namespace App\Pages\Admin;

use Doctrine\ORM\EntityManager;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Accounts extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Accounts');
        $smarty->assign('system_admin_title', 'Accounts');

        $page = 0;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            $page--;
        }

        $em = $core->getServerDatabase('account')->getEntityManager();
        $accounts = $em->getRepository('\\Quantum\\DBO\\Account')->findBy(array(), array(), 25, $page * 25);
        $countAccounts = $this->calcAccountsCount($em);

        $smarty->assign('system_admin_accounts', $accounts);
        $smarty->assign('system_admin_accounts_count', $countAccounts);
        $smarty->assign('system_admin_accounts_current', $page+1);
        $smarty->assign('system_admin_accounts_max', floor($countAccounts / 25) + 1);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/accounts.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

    /**
     * @param $em EntityManager
     * @return int
     */
    private function calcAccountsCount($em) {
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('a'))->from('\\Quantum\\DBO\\Account', 'a');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }
}