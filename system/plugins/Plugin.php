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

}