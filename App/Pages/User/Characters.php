<?php

namespace App\Pages\User;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Characters extends BasePage {
    use Authorization;

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        // Load characters
        $em = $core->getServerDatabase('player')->getEntityManager();
        $characters = $em->getRepository('Quantum\\DBO\\Player')->findBy(array(
             'account_id' => $core->getAccount()->getId()
        ));

        $smarty->assign('user_characters', $characters);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/user/characters.tpl';
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