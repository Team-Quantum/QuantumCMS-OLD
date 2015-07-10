<?php
namespace App\Pages\User;

use Quantum\BasePage;
use Quantum\Core;
use Quantum\DBO\Player;
use Quantum\Translator;

class Home extends BasePage {
    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        // Calculate play time
        $em = $core->getServerDatabase('player')->getEntityManager();
        $players = $em->getRepository('\\Quantum\\DBO\\Player')->findBy(array(
            'account_id' => $core->getUserManager()->getCurrentAccount()->getId()
        ));

        $playTime = 0;

        /** @var $player Player */
        foreach($players as $player) {
            $playTime += $player->getPlaytime();
        }

        $smarty->assign('home_play_time', $playTime);
        $smarty->assign('home_character_count', count($players));
        $smarty->assign('home_empire', $core->getAccount()->getEmpire());

        // Prepare menu links
        $menuPoints = array();
        // Static links
        $menuPoints[] = array(
            'link' => 'User/Itemshop',
            'title' => 'system.itemshop.title'
        );
        $menuPoints[] = array(
            'link' => 'User/Donation',
            'title' => 'system.donation.title'
        );
        $menuPoints[] = array(
            'link' => 'User/Characters',
            'title' => 'system.characters.title'
        );
        $menuPoints[] = array(
            'link' => 'User/ChangeDetails',
            'title' => 'system.changeDetails.title'
        );
        // todo read from core (hook)

        $menuPoints = $this->translateMenuPoints($menuPoints, $core->getTranslator());
        $smarty->assign('home_menuPoints', $menuPoints);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/user/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

    /**
     * @param array $menuPoints
     * @param Translator $translator
     * @return array
     */
    private function translateMenuPoints($menuPoints, $translator) {
        for($i = 0; $i < count($menuPoints); $i++) {
            $menuPoints[$i]['title'] = $translator->translate($menuPoints[$i]['title']);
        }

        return $menuPoints;
    }
}