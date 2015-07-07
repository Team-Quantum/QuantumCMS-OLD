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
        parent::addCronJob('stats_refresh_cron', new StatsCronJob(), 5);
    }

}
