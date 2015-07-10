<?php

namespace Quantum\Data;

class NewsObject {

    /**
     * Message content (cut after X characters)
     * @var string
     */
    private $content;

    /**
     * Link which should be opened when the user press on the read more button
     * @var string
     */
    private $readMore;

    /**
     * True if the read more button should be displayed
     * @var boolean
     */
    private $hasReadMore;

    function __construct($content, $readMore, $hasReadMore)
    {
        $this->content = $content;
        $this->readMore = $readMore;
        $this->hasReadMore = $hasReadMore;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getReadMore()
    {
        return $this->readMore;
    }

    /**
     * @param string $readMore
     */
    public function setReadMore($readMore)
    {
        $this->readMore = $readMore;
    }

    /**
     * @return boolean
     */
    public function isHasReadMore()
    {
        return $this->hasReadMore;
    }

    /**
     * @param boolean $hasReadMore
     */
    public function setHasReadMore($hasReadMore)
    {
        $this->hasReadMore = $hasReadMore;
    }

}