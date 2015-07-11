<?php
namespace App\Pages;

use Quantum\Authorization;
use Quantum\ContainerPage;
use Quantum\Controller;

class Admin extends Controller {

    /**
     * Home page
     * @return string
     */
    public function home() {
        return 'admin.tpl:pages/admin/home.tpl';
    }

}