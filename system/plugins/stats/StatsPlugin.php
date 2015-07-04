<?php

namespace Quantum\Plugins\Stats;

use Quantum\Core;
use Quantum\DBO\CoreStatus;
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

        $this->getStatus($core, $smarty);

        $smarty->assign('accounts', $size_acc);
        $smarty->assign('players', $size_pl);
    }

    /**
     * @param $core Core
     * @param $smarty \Smarty
     * returns an object with Channel Statuses
     */
    public function getStatus($core, $smarty){

        $database = $core->getInternalDatabase('core_statuses');
        $serverStatuses = $database->getEntityManager()->getRepository('Quantum\\DBO\\CoreStatus')->findAll();

        $smarty->assign('serverstatuses', $serverStatuses);

    }
}