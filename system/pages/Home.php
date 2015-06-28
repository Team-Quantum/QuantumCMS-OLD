<?php

namespace Quantum\Pages;

use Quantum\Core;

class Home implements IPage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        $database = $core->getServerDatabase('account');
        $size_acc = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Account')->findAll());

        $database = $core->getServerDatabase('player');
        $size_pl = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Player')->findAll());

        $smarty->assign('accounts', $size_acc);
        $smarty->assign('players', $size_pl);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
        return 'pages/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {

    }
}