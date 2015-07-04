<?php

namespace Quantum\Pages;

class User extends ContainerPage {

    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct(SYSTEM_DIR . 'pages' . DS . 'user' . DS, '\\Quantum\\Pages\\User\\');
    }
}