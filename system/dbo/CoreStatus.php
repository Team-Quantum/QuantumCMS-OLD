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

    /**
     * CoreStatus constructor.
     * @param string $name
     * @param string $address
     * @param int $port
     * @param bool $status
     * @param int $lastCheck
     */
    public function __construct($name, $address, $port, $status, $lastCheck) {
        $this->name = $name;
        $this->address = $address;
        $this->port = $port;
        $this->status = $status;
        $this->lastCheck = $lastCheck;
    }

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
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port) {
        $this->port = $port;
    }

    /**
     * @return boolean
     */
    public function isStatus() {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getLastCheck() {
        return $this->lastCheck;
    }

    /**
     * @param int $lastCheck
     */
    public function setLastCheck($lastCheck) {
        $this->lastCheck = $lastCheck;
    }


}