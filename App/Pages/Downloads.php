<?php
namespace App\Pages;

use Doctrine\ORM\EntityManager;
use Quantum\BasePage;
use Quantum\Core;
//use Quantum\DatabaseManager;

class Downloads extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        $smarty->assign('page_file_downloads',
            $this->getDownloads(
                $this->getClientVersion(),
                $core->getInternalDatabase()->getEntityManager()
            )
        );
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
        return 'pages/downloads.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
    }

    private function getClientVersion(){
        // TODO: Read Version from Database and return it
        return "1.1";
    }

    /**
     * Returns an array of files which is based on the Version Number
     * @param $version
     * @param $db EntityManager
     * @return array
     */
    private function getDownloads($version, $db){
        return $db->getRepository('\\Quantum\\DBO\\Download')->findBy(array(
            'version' => $version,
            'shown' => 1
        ));
    }
}