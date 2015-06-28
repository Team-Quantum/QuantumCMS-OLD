<?php

namespace Quantum\DBO;

class Translation {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $translated;

    /**
     * Translation constructor.
     * @param string $key
     * @param string $lang
     * @param string $translated
     */
    public function __construct($key, $lang, $translated)
    {
        $this->key = $key;
        $this->lang = $lang;
        $this->translated = $translated;
    }

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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getTranslated()
    {
        return $this->translated;
    }

    /**
     * @param string $translated
     */
    public function setTranslated($translated)
    {
        $this->translated = $translated;
    }

}