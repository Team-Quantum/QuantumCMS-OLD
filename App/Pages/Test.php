<?php
namespace App\Pages;

use Quantum\Controller;

class Test extends Controller {

    public function done()
    {
        echo 'login.tpl';

        return 'indexx.tpl:pages/login.tpl';
    }

    public function test2()
    {
        return 'pages/login.tpl';
    }
}