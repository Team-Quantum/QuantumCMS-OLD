<?php

namespace App\Pages\Admin;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;


class Home extends BasePage {
    use Authorization;

    private function readSessions(){
        $savePath = ini_get( 'session.save_path');
        $files = scandir($savePath);
        $tag = 'sess_';
        $sessions = NULL;

        foreach($files as $file){
            if(stristr($file, $tag) === TRUE){
                $sessions[] = $file;
            }
        }

        return $sessions;
    }

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Home');
        $smarty->assign('system_admin_title', 'Home');

        // TESTING
        $smarty->assign('overview', $this->getOverview());
        $smarty->assign('accountStats', $this->getAccountStats());
        //$smarty->assign('CharStats', $this->getCharStats());
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

    /**
     * @return mixed
     */
    private function showServer(){
        return $_SERVER;
    }

    /**
     * @return mixed
     */
    private function showCookie(){
        return $_COOKIE;
    }

    /**
     * @return mixed
     */
    private function showSession(){
        return $_SESSION;
    }

    /**
     * @return array
     */
    private function getAccountStats(){

        $em = $this->core->getServerDatabase('account')->getEntityManager();
        /* count all accounts */
        $Accounts = $this->calcAccounts();
        /* count red/shinsoo accounts */
        $Shinsoo = count($em->getRepository('Quantum\\DBO\\Account')->findBy(array(
            'empire' => 1
        )));
        /* count yellow/chunjo accounts */
        $Chunjo = count($em->getRepository('Quantum\\DBO\\Account')->findBy(array(
            'empire' => 2
        )));
        /* count blue/jinno accounts */
        $Jinno = count($em->getRepository('Quantum\\DBO\\Account')->findBy(array(
            'empire' => 3
        )));

        return compact('Accounts', 'Shinsoo', 'Chunjo', 'Jinno');
    }

    /**
     * @return array
     */
    private function getOverview(){

        $Accounts = $this->calcAccounts();
        $Characters = $this->calcChars();
        $Items = $this->calcItems();
        $Guilds = $this->calcGuilds();

        return compact('Accounts', 'Characters', 'Items', 'Guilds');
    }

    /**
     * @return mixed
     */

    // TODO: move all methods into one

    private function calcItems() {
        $em = $this->core->getServerDatabase('player')->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('i'))->from('\\Quantum\\DBO\\Item', 'i');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }

    private function calcYang() {
        $em = $this->core->getServerDatabase('player')->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('y'))->from('\\Quantum\\DBO\\Player', 'y');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }

    private function calcAccounts() {
        $em = $this->core->getServerDatabase('account')->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('a'))->from('\\Quantum\\DBO\\Account', 'a');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }

    private function calcChars() {
        $em = $this->core->getServerDatabase('player')->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('p'))->from('\\Quantum\\DBO\\Player', 'p');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }

    private function calcGuilds() {
        $em = $this->core->getServerDatabase('player')->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select($qb->expr()->count('g'))->from('\\Quantum\\DBO\\Guild', 'g');

        $query = $qb->getQuery();
        return $query->getSingleScalarResult();
    }

    // TODO: fix this crappy & stupid method

    private function formatNumber($array){

        $formatted = NULL;

        foreach($array as $key){
            $keys[] = key($key);
        }

        foreach($array as $value){
            $val = number_format($value, 0,
                Core::getInstance()->getTranslator()->translate('system.number.dec'),
                Core::getInstance()->getTranslator()->translate('system.number.thousand'));

            $formatted[] =  $val;

        }

        $new = array(
            key($array) => $formatted[0],
            key(next($array)) => $formatted[1],
            key(next($array)) => $formatted[2],
            key(next($array)) => $formatted[3]
        );

        return $new;
    }

    public function format($value){
        return number_format($value, 0,
            Core::getInstance()->getTranslator()->translate('system.number.dec'),
            Core::getInstance()->getTranslator()->translate('system.number.thousand'));
    }

}