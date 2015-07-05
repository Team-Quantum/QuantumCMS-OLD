<?php

namespace Quantum\Cronjobs;

use Doctrine\DBAL\Driver\Statement;
use Quantum\Core;

class CronJobs
{

    /**
     * @var Core
     */
    private $core;

    /**
     * @param $core Core
     */
    public function __construct($core) {
        $this->core = $core;
        // TODO: Run Jobs

        //print_r($this->readServerStats());

        /**
         * var integer
         * get actual timestamp
         */
        $timeNow = $this->timestampNow();

        /**
         * var integer
         * safes the last check timestamps on different variable
         */
        $coreLastCheck = $this->getLastChecked('core');
        $accLastCheck = $this->getLastChecked('acc');
        $charLastCheck = $this->getLastChecked('char');
        echo $coreLastCheck.'<br/>';
        echo $accLastCheck.'<br/>';
        echo $charLastCheck.'<br/><br/><br/>';

        /**
         * var array
         * safes the acc & player stats on a variable
         */
        $playerStats = $this->readPlayerStats();
        $accountStats = $this->readAccountStats();
        print_r($playerStats); echo "<br>";
        print_r($accountStats); echo "<br>";

    }

    private function timestampNow(){
        return time();
    }

    private function getLastChecked($type) {

        $lastCheck = array();

        if($type == 'core'){
            foreach($this->readServerLastCheck() as $checked){
                $lastCheck[] = $checked->getLastCheck();
            }
            return $lastCheck[0];

        }elseif($type == 'acc'){

            foreach($this->readAccountLastCheck() as $checked){
                $lastCheck[] = $checked->getLastCheck();
            }
            return $lastCheck[0];

        }elseif($type == 'char'){
            foreach($this->readPlayerLastCheck() as $checked){
                $lastCheck[] = $checked->getLastcheck();
            }
            return $lastCheck[0];

        }else{
            return null;
        }
    }

    public function readPlayerStats() {

        $sql_chars = 'SELECT COUNT(id) AS chars FROM player;';
        $sql_online_now = 'SELECT COUNT(id) AS count_now FROM player WHERE DATE_SUB(NOW(), INTERVAL 5 MINUTE) < last_play;';
        $sql_online_day = 'SELECT COUNT(id) AS count_day FROM player WHERE DATE_SUB(NOW(), INTERVAL 24 HOUR) < last_play;';
        $sql_guilds = 'SELECT COUNT(id) AS guilds FROM guild;';

        $con = $this->core->getServerDatabase('player')->getEntityManager()->getConnection();

        $stmt = array(
            'chars' =>  $con->executeQuery($sql_chars),
            'now'   =>  $con->executeQuery($sql_online_now),
            'day'   =>  $con->executeQuery($sql_online_day),
            'guilds'   =>  $con->executeQuery($sql_guilds)
        );

        $value = array();

        /** @var Statement $row */
        foreach($stmt as $row) {
            $value[] = $row->fetchAll();
        }
        return $value;
    }

    public function readAccountStats() {

        $sql_acc = 'SELECT COUNT(id) AS accs FROM account;';
        $sql_acc_y = 'SELECT COUNT(id) AS yellow FROM account WHERE empire=2;';
        $sql_acc_b = 'SELECT COUNT(id) AS blue FROM account WHERE empire=3;';
        $sql_acc_r = 'SELECT COUNT(id) AS red FROM account WHERE empire=1;';

        $con = $this->core->getServerDatabase('account')->getEntityManager()->getConnection();

        $stmt = array(
            'accs' =>  $con->executeQuery($sql_acc),
            'yellow'   =>  $con->executeQuery($sql_acc_y),
            'blue'   =>  $con->executeQuery($sql_acc_b),
            'red'   =>  $con->executeQuery($sql_acc_r)
        );

        $value = array();

        /** @var Statement $row */
        foreach($stmt as $row) {
            $value[] = $row->fetchAll();
        }
        return $value;
    }

    public function readServerLastCheck() {

        $internal = $this->core->getInternalDatabase()->getEntityManager()->getRepository('Quantum\\DBO\\CoreStatus');
        $getArray = $internal->findAll();

        return $getArray;
    }

    public function readPlayerLastCheck() {

        $internal = $this->core->getInternalDatabase()->getEntityManager()->getRepository('Quantum\\DBO\\PlayerStatus');
        $getArray = $internal->findAll();

        return $getArray;
    }

    public function readAccountLastCheck() {

        $internal = $this->core->getInternalDatabase()->getEntityManager()->getRepository('Quantum\\DBO\\AccountStatus');
        $getArray = $internal->findAll();

        return $getArray;
    }

    public function insertIntoDatabase($type, $timeNow, $lastCheck){

        $nextCheck = $lastCheck + (5 * 60);

        if($type == 'core'){
            if($timeNow >= $nextCheck){

                // TODO: Insert Data into DB
                

                return true;
            } else {
                return false;
            }

        } elseif($type == 'player') {
            if($timeNow >= $nextCheck){

                // TODO: Insert Data into DB

                return true;
            } else {
                return false;
            }

        } elseif($type == 'account') {
            if($timeNow >= $nextCheck){

                // TODO: Insert Data into DB

                return true;
            } else {
                return false;
            }

        } else {
            return null;
        }
    }


}
