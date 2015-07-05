<?php

namespace Quantum\DBO;

class AccountStatus {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $value;

    /**
     * @var integer
     */
    protected $lastCheck;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getLastCheck()
    {
        return $this->lastCheck;
    }

    /**
     * @param int $lastCheck
     */
    public function setLastCheck($lastCheck)
    {
        $this->lastCheck = $lastCheck;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


}