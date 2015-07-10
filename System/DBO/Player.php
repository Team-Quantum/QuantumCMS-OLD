<?php

namespace Quantum\DBO;

class Player {
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $account_id;

    /**
     * @var integer
     */
    protected $name;

    /**
     * @var integer
     */
    protected $job;

    /**
     * @var integer
     */
    protected $playtime;

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
    protected $gold;

    /**
     * @var \DateTime
     */
    protected $last_play;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAccountId() {
        return $this->account_id;
    }

    /**
     * @param int $account_id
     */
    public function setAccountId($account_id) {
        $this->account_id = $account_id;
    }

    /**
     * @return int
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getJob() {
        return $this->job;
    }

    /**
     * @param int $job
     */
    public function setJob($job) {
        $this->job = $job;
    }

    /**
     * @return int
     */
    public function getPlaytime() {
        return $this->playtime;
    }

    /**
     * @param int $playtime
     */
    public function setPlaytime($playtime) {
        $this->playtime = $playtime;
    }

    /**
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level) {
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
    public function getGold() {
        return $this->gold;
    }

    /**
     * @param int $gold
     */
    public function setGold($gold) {
        $this->gold = $gold;
    }

    /**
     * @return \DateTime
     */
    public function getLastPlay() {
        return $this->last_play;
    }

    /**
     * @param \DateTime $last_play
     */
    public function setLastPlay($last_play) {
        $this->last_play = $last_play;
    }


}