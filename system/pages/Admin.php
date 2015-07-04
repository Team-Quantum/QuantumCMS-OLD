<?php

namespace Quantum\Pages;

class Admin extends ContainerPage {

    public function __construct() {
        parent::__construct(SYSTEM_DIR . 'pages' . DS . 'admin' . DS, '\\Quantum\\Pages\\Admin\\');
    }

}