<?php

namespace App\Pages;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class Guild extends BasePage {
    use Authorization;

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        if(count($this->args) == 0) {
            $smarty->assign('guild_found', false);
            return;
        }

        $guildName = $this->args[0];

        // Load guild from database
        $em = $core->getServerDatabase('player')->getEntityManager();
        $guild = $em->getRepository('\\Quantum\\DBO\\Guild')->findOneBy(array(
            'name' => $guildName
        ));

        if($guild == null) {
            $smarty->assign('guild_found', false);
            return;
        }

        $smarty->assign('guild', $guild);
        $smarty->assign('guild_found', true);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/guild.tpl';
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