<?php


namespace App\Pages\Admin\Import;


use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class ItemProto extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty) {

    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/import/item_proto.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }
}