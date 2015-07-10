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
    protected $trans;

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
     * @param string $trans
     * @param string $lang
     * @param string $translated
     */
    public function __construct($trans, $lang, $translated)
    {
        $this->trans = $trans;
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
    public function getTrans()
    {
        return $this->trans;
    }

    /**
     * @param string $trans
     */
    public function setTrans($trans)
    {
        $this->trans = $trans;
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