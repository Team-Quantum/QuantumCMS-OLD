<?php

namespace App\Pages;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Character extends BasePage {
    use Authorization;

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        if(count($this->args) == 0) {
            $smarty->assign('character_found', false);
            return;
        }

        $characterName = $this->args[0];

        // Load player/character from database
        $em = $core->getServerDatabase('player')->getEntityManager();
        $player = $em->getRepository('\\Quantum\\DBO\\Player')->findOneBy(array(
            'name' => $characterName
        ));

        if($player == null) {
            $smarty->assign('character_found', false);
            return;
        }

        //$smarty->assign('character_name', $characterName);
        $smarty->assign('character_player', $player);
        $smarty->assign('character_found', true);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/character.tpl';
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