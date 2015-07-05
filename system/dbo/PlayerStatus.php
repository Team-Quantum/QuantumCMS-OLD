<?php

namespace Quantum\DBO;

class PlayerStatus {
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $info;

    /**
     * @var integer
     */
    private $count;

    /**
     * @var integer
     */
    private $lastcheck;

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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getLastcheck()
    {
        return $this->lastcheck;
    }

    /**
     * @param int $lastcheck
     */
    public function setLastcheck($lastcheck)
    {
        $this->lastcheck = $lastcheck;
    }



}