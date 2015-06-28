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
     * @var DateTime
     */
    protected $last_play;
}