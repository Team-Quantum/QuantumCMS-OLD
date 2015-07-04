<?php

namespace Quantum\DBO;


class Download {
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $version;

    /**
     * @var boolean
     */
    private $shown;

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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return boolean
     */
    public function isShown()
    {
        return $this->shown;
    }

    /**
     * @param boolean $shown
     */
    public function setShown($shown)
    {
        $this->shown = $shown;
    }


}