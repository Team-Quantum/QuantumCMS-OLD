<?php

namespace Quantum\CronJobs;

use Quantum\Core;

interface CronJob {

    /**
     * Called on execute
     * @param $core Core
     * @return bool Status of execution (true=success)
     */
    public function execute($core);

}