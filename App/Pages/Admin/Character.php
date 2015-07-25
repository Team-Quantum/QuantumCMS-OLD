<?php

namespace App\Pages\Admin;

use Quantum\BasePage;
use Quantum\Core;
use Quantum\DBO\Item;
use Smarty;

class Character extends BasePage {

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
        $em = $core->getServerDatabase('player')->getEntityManager();

        $character = $em->getRepository('\\Quantum\\DBO\\Player')->findOneBy(array('name' => $characterName));
        if($character == null) {
            $smarty->assign('character_found', false);
            return;
        }

        $smarty->assign('character_found', true);
        $smarty->assign('system_admin_character', $character);
        $smarty->assign('system_admin_title', 'Character - ' . $character->getName());
        $smarty->assign('system_admin_menu_active', 'Characters');

        // Load items of player
        $items = $em->getRepository('\\Quantum\\DBO\\Item')->findBy(
            array(
                'owner_id' => $character->getId(),
                'window' => 'INVENTORY'
            )
        );

        // Split to inventory pages
        $invWidth = 5;              // Todo: Read from configuration
        $invHeight = 9;             // Todo: Read from configuration
        $inventory = array();
        for($i = 0; $i < 2; $i++) { // Todo: Read from configuration how many inventory pages exists
            $inventory[$i] = array();

            /** @var $item Item */
            foreach($items as $item) {
                if(floor($item->getPos() / $invWidth / $invHeight) == $i) {
                    $inventory[$i][] = $item;
                }
            }
        }

        $smarty->assign('system_admin_inventories', $inventory);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/character.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }
}