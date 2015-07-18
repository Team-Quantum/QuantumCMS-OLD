<?php

namespace App\Pages\User;

use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class ChangeDetails extends BasePage{

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {

        /**
         * Change Password
         */
        if(isset($_POST['action']) && $_POST['action'] == 'user-change-pass') {

            $em = $core->getServerDatabase('account')->getEntityManager();

            if(!empty($_POST['new_pass']) && $_POST['new_pass'] == $_POST['new_pass2']) {

                $newPass = $core->createHash($_POST['new_pass'], $core->getAccount());

                $account = $core->getAccount();
                $account->setPassword($newPass);
                $em->persist($account);
                $em->flush();

                $core->addSuccess('system.change.details.pass.success');
            }else{
                $core->addError('system.change.details.pass.fail');
            }

        } /**
         * Change Mail
         */
        elseif(isset($_POST['action']) && $_POST['action'] == 'user-change-mail') {
            // TODO: Check given mail (old mail == db mail)
            $em = $core->getServerDatabase('account')->getEntityManager();

            if($core->getAccount()->getEmail() == $_POST['old_mail']) {

                if (!empty($_POST['new_mail']) && $_POST['new_mail'] == $_POST['new_mail']) {

                    $newMail = $_POST['new_mail'];

                    $account = $core->getAccount();
                    $account->setPassword($newMail);
                    $em->persist($account);
                    $em->flush();

                    $core->addSuccess('system.change.details.mail.success');
                } else {
                    $core->addError('system.change.details.mail.fail');
                }
            } else {
                $core->addError('system.change.details.mail.fail');
            }
        } /**
         * Change DisplayName
         */
        elseif(isset($_POST['action']) && $_POST['action'] == 'user-change-name') {

            $em = $core->getInternalDatabase()->getEntityManager();
            $tmp = $em->getRepository('\\Quantum\\DBO\\InternalAccount')->findOneBy(array(
                'displayName' => $_POST['new_name']
            ));

            if($tmp == null) {
                // Update internal data
                $internalAccount = $core->getUserManager()->getCurrentInternalAccount();
                $internalAccount->setDisplayName($_POST['new_name']);

                $em->persist($internalAccount);
                $em->flush();

                $core->addSuccess('system.change.details.name.success');
            } else {
                $core->addError('system.change.details.name.fail');
            }
        }
        elseif(empty($_POST)){
            $core->addInfo('system.change.details.welcome');
        } /**
         * If Post Value isn't correct, show an error
         */
        else {
            $core->addError('system.change.details.illegal.input');
        }

    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
        return 'pages/user/change_details.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {

    }
}