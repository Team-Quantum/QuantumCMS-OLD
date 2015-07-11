<?php
namespace App\Pages;

use Quantum\BasePage;
use Quantum\Core;
use Quantum\DBO\Account;

class Login extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        if($_POST['action'] == 'system-login') {
            if(!$core->validateCaptcha()) {
                $core->addError('system.errors.captcha');
                return;
            }

            // Load account
            $em = $core->getServerDatabase('account')->getEntityManager();
            /** @var $account Account */
            $account = $em->getRepository('Quantum\\DBO\\Account')->findOneBy(array('login' => $_POST['username']));

            if (is_null($account)) {
                $core->addError('system.errors.login.wrongpwd');
                return;
            }

            // Check password
            $inputHash = $core->createHash($_POST['password'], $account);

            if($inputHash !== $account->getPassword()) {
                $core->addError('system.errors.login.wrongpwd');
            }

            $core->setAccount($account);

            if($core->getUserManager()->getCurrentInternalAccount() == null) {
                $this->redirect('MigrateAccount');
            }

            $this->redirect('Home');
        }
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
       return 'pages/login.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
        // TODO: Implement postRender() method.
    }
}