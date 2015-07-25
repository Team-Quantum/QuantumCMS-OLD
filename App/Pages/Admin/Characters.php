<?php

namespace App\Pages\Admin;

use Doctrine\ORM\EntityManager;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Characters extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Characters');
        $smarty->assign('system_admin_title', 'Characters');

        $page = 0;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            $page--;
        }

        $em = $core->getServerDatabase('player')->getEntityManager();
        $characters = $em->getRepository('\\Quantum\\DBO\\Player')->findBy(array(), array(), 25, $page * 25);
        $countCharacters = $this->calcCharactersCount($em);

        $smarty->assign('system_admin_characters', $characters);
        $smarty->assign('system_admin_characters_count', $countCharacters);
        $smarty->assign('system_admin_characters_current', $page+1);
        $smarty->assign('system_admin_characters_max', floor($countCharacters / 25) + 1);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/characters.tpl';
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
    private function calcCharactersCount($em) {
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('p'))->from('\\Quantum\\DBO\\Player', 'p');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }
}