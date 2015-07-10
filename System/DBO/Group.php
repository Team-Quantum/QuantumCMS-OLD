<?php

namespace Quantum\DBO;

class Group {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array(Privilege)
     */
    private $privileges;

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
     * @return array
     */
    public function getPrivileges() {
        return $this->privileges;
    }

    /**
     * @param array $privileges
     */
    public function setPrivileges($privileges) {
        $this->privileges = $privileges;
    }



}