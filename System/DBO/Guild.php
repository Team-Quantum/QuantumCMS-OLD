<?php

namespace Quantum\DBO;

use Quantum\Core;

class Guild {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $master;

    /**
     * @var integer
     */
    protected $level;

    /**
     * @var integer
     */
    protected $exp;

    /**
     * @var integer
     */
    protected $win;

    /**
     * @var integer
     */
    protected $draw;

    /**
     * @var integer
     */
    protected $loss;

    /**
     * @var integer
     */
    protected $ladder_point;

    /**
     * @var Player
     */
    protected $owner;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * @param int $master
     */
    public function setMaster($master)
    {
        $this->master = $master;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getExp() {
        return $this->exp;
    }

    /**
     * @param int $exp
     */
    public function setExp($exp) {
        $this->exp = $exp;
    }

    /**
     * @return int
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * @param int $win
     */
    public function setWin($win)
    {
        $this->win = $win;
    }

    /**
     * @return double
     */
    public function getWinRatio() {
        if($this->loss == 0) {
            return $this->win;
        }
        return $this->win / $this->loss;
    }

    /**
     * @return int
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @param int $draw
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    /**
     * @return int
     */
    public function getLoss()
    {
        return $this->loss;
    }

    /**
     * @param int $loss
     */
    public function setLoss($loss)
    {
        $this->loss = $loss;
    }

    /**
     * @return int
     */
    public function getLadderPoint()
    {
        return $this->ladder_point;
    }

    /**
     * @param int $ladder_point
     */
    public function setLadderPoint($ladder_point)
    {
        $this->ladder_point = $ladder_point;
    }

    /**
     * @return array
     */
    public function getMembers() {
        $em = Core::getInstance()->getServerDatabase('player')->getEntityManager();

        $guildMembers = $em->getRepository('Quantum\\DBO\\GuildMember')->findBy(array(
            'guild_id' => $this->id
        ));

        $ret = array();
        /** @var $guildMember GuildMember */
        foreach($guildMembers as $guildMember) {
            $ret[] = $em->find('Quantum\\DBO\\Player', $guildMember->getPid());
        }

        return $ret;
    }

    /**
     * @return Player
     */
    public function getOwner() {
        if($this->owner == null) {
            $em = Core::getInstance()->getServerDatabase('player')->getEntityManager();
            $this->owner = $em->find('Quantum\\DBO\\Player', $this->master);
        }
        
        return $this->owner;
    }

}