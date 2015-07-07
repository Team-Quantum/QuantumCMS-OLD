<?php

namespace Quantum;

use Quantum\CronJobs\CronJob;
use Quantum\Plugins\ISidebar;

class PluginManager {

    /**
     * @var array
     */
    private static $sidebars = array();

    private static $cronjobs = array();

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

    /**
     * Register a cron job
     * @param $name String The name of the cron job
     * @param $class mixed The class which manages the cron job
     * @param $interval int The interval in minutes between execution
     * @throws \Exception
     */
    public static function addCronJob($name, $class, $interval) {
        if(array_key_exists($name, PluginManager::$cronjobs)) {
            throw new \Exception('CronJob Name is already in use!');
        }
        if(!($class instanceof CronJob)) {
            throw new \Exception('Invalid CronJob "' . $name . '".');
        }

        PluginManager::$cronjobs[$name] = array();
        PluginManager::$cronjobs[$name]['class'] = $class;
        PluginManager::$cronjobs[$name]['interval'] = $interval;
    }

    /**
     * @param $core Core
     */
    public static function processCronJobs($core) {
        // Get internal entity manager
        $em = $core->getInternalDatabase()->getEntityManager();

        // Go throw every cron job
        foreach(PluginManager::$cronjobs as $name => $data) {
            // Validate
            if(array_key_exists('class', $data) && array_key_exists('interval', $data)) {
                /** @var $class CronJob */
                $class = $data['class'];
                $interval = $data['interval'];

                // Get details from database
                /** @var $details DBO\CronJob */
                $details = $em->getRepository('Quantum\\DBO\\CronJob')->findOneBy(array(
                    'name' => $name
                ));
                if($details == null) {
                    $details = new DBO\CronJob();
                    $details->setName($name);
                    $details->setLastRun(0);
                    $em->persist($details);
                }

                // Check if the cron job should now be executed
                if(PluginManager::timeMinutes() >= $details->getLastRun() + $interval * 60) {
                    if($core->inDev()) echo 'Execute cron job "' . $name . '"' . PHP_EOL;
                    if($class->execute($core)) {
                        // Run was successful
                        $details->setLastRun(PluginManager::timeMinutes());
                        $em->persist($details);

                        if($core->inDev()) echo 'Success!' . PHP_EOL;
                    } else {
                        // todo logging
                        if($core->inDev()) echo 'Failed!' . PHP_EOL;
                    }
                } else {
                    if($core->inDev()) echo 'Cron job "' . $name . '" is not needed in this run!' . PHP_EOL;
                }
            }
        }

        $em->flush();
    }

    private static function timeMinutes() {
        return time() - date('s');
    }

}