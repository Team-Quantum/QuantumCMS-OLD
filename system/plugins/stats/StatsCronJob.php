<?php

namespace Quantum\plugins\stats;

use Quantum\Core;
use Quantum\CronJobs\CronJob;

class StatsCronJob implements CronJob {

    /**
     * Called on execute
     * @param $core Core
     * @return bool Status of execution (true=success)
     */
    public function execute($core) {
        // TODO: Implement execute() method.
        return true;
    }

}