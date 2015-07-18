<?php

namespace App\Pages;

use Quantum\Authorization;
use Quantum\ContainerPage;

class Admin extends ContainerPage {
    use Authorization;

    private $neededPrivileges = 'system_admin';
}