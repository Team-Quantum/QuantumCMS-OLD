<?php

namespace Quantum\Plugins;

use Quantum\Core;

interface ISidebar {

    /**
     * @param $core Core
     * @param $smarty \Smarty
     * @return String
     */
    public function getTemplate($core, $smarty);

    /**
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function initialise($core, $smarty);

}