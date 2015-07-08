<?php
namespace App\Pages;

use Quantum\Authorization;
use Quantum\ContainerPage;

class Admin extends ContainerPage {
    use Authorization;

    protected $neededPrivileges = 'system_admin';
}