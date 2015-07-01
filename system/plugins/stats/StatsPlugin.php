<?php

namespace Quantum\Plugins\Stats;

use Quantum\Plugins\ISidebar;
use Quantum\Plugins\Plugin;

class StatsPlugin extends Plugin {

    /**
     * StatsPlugin constructor.
     */
    public function __construct() {
        parent::addSidebar('RIGHT', 'Server Statistics', new StatsSidebar());
    }

}

class StatsSidebar implements ISidebar {

    public function getTemplate($core, $smarty) {
        return 'plugins/stats/sidebar.tpl';
    }

    public function initialise($core, $smarty) {
        $database = $core->getServerDatabase('account');
        $size_acc = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Account')->findAll());

        $database = $core->getServerDatabase('player');
        $size_pl = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Player')->findAll());

        $smarty->assign('accounts', $size_acc);
        $smarty->assign('players', $size_pl);
    }
}