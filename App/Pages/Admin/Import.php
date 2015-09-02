<?php

namespace App\Pages\Admin;

use Quantum\Authorization;
use Quantum\ContainerPage;

class Import extends ContainerPage {
    use Authorization;

    private $neededPrivileges = 'system_admin';

    public function preRender($core, $smarty) {

    }
}