<?php

namespace Quantum\DBO;

class CoreStatus {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var int
     */
    protected $port;

    /**
     * @var boolean
     */
    protected $status;

    /**
     * @var int
     */
    protected $lastCheck;

}