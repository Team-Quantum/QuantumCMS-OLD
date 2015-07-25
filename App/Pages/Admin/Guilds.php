<?php

namespace App\Pages\Admin;

use Doctrine\ORM\EntityManager;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Guilds extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Guilds');
        $smarty->assign('system_admin_title', 'Guilds');

        $page = 0;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            $page--;
        }

        $em = $core->getServerDatabase('player')->getEntityManager();
        $guilds = $em->getRepository('\\Quantum\\DBO\\Guild')->findBy(array(), array(), 25, $page * 25);
        $countGuilds = $this->calcGuildsCount($em);

        $smarty->assign('system_admin_guilds', $guilds);
        $smarty->assign('system_admin_guilds_count', $countGuilds);
        $smarty->assign('system_admin_guilds_current', $page+1);
        $smarty->assign('system_admin_guilds_max', floor($countGuilds / 25) + 1);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/guilds.tpl';
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
    private function calcGuildsCount($em) {
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('g'))->from('\\Quantum\\DBO\\Guild', 'g');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }
}