<?php

namespace Quantum;

use Quantum\Plugins\ISidebar;

class PluginManager {

    /**
     * @var array
     */
    private static $sidebars = array();

    /**
     * @param $core Core
     * @throws \Exception
     */
    public static function load($core) {
        $dir = SYSTEM_DIR . 'plugins' . DS;
        if($handle = opendir($dir)) {
            while(false !== ($entry = readdir($handle))) {
                if($entry != '.' && $entry != '..' && is_dir($dir.$entry)) {
                    $pluginDetails = json_decode(file_get_contents($dir.$entry.DS.'plugin.json'));

                    $classes = $pluginDetails->{'load'};
                    foreach($classes as $class) {
                        $includePath = $dir.$entry.DS.$class.'.php';
                        if(file_exists($includePath)) {
                            require_once($includePath);
                            $fqName = $pluginDetails->{'namespace'}.'\\'.$class;

                            if(class_exists($fqName)) {
                                new $fqName();
                            } else {
                                throw new \Exception("Failed to load class " . $fqName . " used by plugin " . $pluginDetails->{"name"});
                            }
                        } else {
                            throw new \Exception("Missing class " . $class . " for plugin " . $pluginDetails->{'name'});
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $side String Allowed values: LEFT, RIGHT
     * @param $name String The internal name for referencing
     * @param $class mixed The class which manages this sidebar
     */
    public static function addSidebar($side, $name, $class) {
        if(!array_key_exists($side, PluginManager::$sidebars)) {
            PluginManager::$sidebars[$side] = array();
        }

        PluginManager::$sidebars[$side][$name] = $class;
    }

    /**
     * @param $core Core
     * @param $smarty \Smarty
     */
    public static function processSidebars($core, $smarty) {
        foreach(PluginManager::$sidebars as $side => $panels) {
            $side = strtolower($side);
            $templates = array();

            /**
             * @var $name String
             * @var $class ISidebar
             */
            foreach($panels as $name => $class) {
                $class->initialise($core, $smarty);
                $templates[] = $class->getTemplate($core, $smarty);
            }

            $smarty->assign('system_sidebar_' . $side, $templates);
        }
    }

}