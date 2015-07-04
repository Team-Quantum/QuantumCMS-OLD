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
        $size_guilds = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Guild')->findAll());

        // TODO: Write Cronjob and Cache SQL things
        $onlineNow = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Player')->findBy(array(
            'name'   =>  'bruh'
        )));
        $onlineLastDay = count($database->getEntityManager()->getRepository('Quantum\\DBO\\Player')->findBy(array(
            'name'   =>  'NONAME'
        )));

        // Get Serverstatus
        $this->getStatus($core, $smarty);

        // Assign Smarty Variables
        $smarty->assign('accounts', $size_acc);
        $smarty->assign('players', $size_pl);
        $smarty->assign('guilds', $size_guilds);
        $smarty->assign('playerOnlineNow', $onlineNow);
        $smarty->assign('playerOnlineLastDay', $onlineLastDay);
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