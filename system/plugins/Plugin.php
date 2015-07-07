<?php

namespace Quantum\Plugins;

use Quantum\PluginManager;

class Plugin {

    /**
     * @param $side String Allowed values: LEFT, RIGHT
     * @param $name String The internal name for referencing
     * @param $class mixed The class which manages this sidebar
     */
    public function addSidebar($side, $name, $class) {
        PluginManager::addSidebar($side, $name, $class);
    }

    /**
     * Register a cron job
     * @param $name String The name of the cron job
     * @param $class mixed The class which manages the cron job
     * @param $interval int The interval in minutes between execution
     */
    public function addCronJob($name, $class, $interval) {
        PluginManager::addCronJob($name, $class, $interval);
    }

}