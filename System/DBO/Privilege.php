<?php

namespace Quantum\DBO;

class Privilege {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $technicalName;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $category;

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
    public function getTechnicalName() {
        return $this->technicalName;
    }

    /**
     * @param string $technicalName
     */
    public function setTechnicalName($technicalName) {
        $this->technicalName = $technicalName;
    }

    /**
     * @return string
     */
    public function getDesc() {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc($desc) {
        $this->desc = $desc;
    }

    /**
     * @return string
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category) {
        $this->category = $category;
    }



}