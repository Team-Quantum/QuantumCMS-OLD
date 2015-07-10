<?php

namespace Quantum\DBO;

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


}