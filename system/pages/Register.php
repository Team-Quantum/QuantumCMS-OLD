<?php

namespace Quantum\Pages;


use Quantum\Core;
use Quantum\DBO\Account;
use Quantum\DBO\InternalAccount;

class Register implements IPage{

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        if(isset($_POST['action']) && $_POST['action'] == 'system-register') {
            // Check required fields
            $requiredFields = array(
                'acc_name', 'visible_name', 'password', 'check_password',
                'mailaddress', 'check_mailaddress', "deletecode"
            );

            $success = true;
            foreach($requiredFields as $field) {
                if(empty($_POST[$field])) {
                    $core->addError('system.register.missing.' . $field);
                    $success = false;
                }
            }

            if($success) {
                // Validate Captcha
                if($core->validateCaptcha()) {
                    // Validate lengths
                    $requiredLengths = array(
                        'acc_name' => array(8, 16),
                        'visible_name' => array(8, 16),
                        'password' => array(8, 16),
                        'mailaddress' => array(5, 50),
                        'deletecode' => array(7, 7)
                    );

                    $success = true;
                    foreach($requiredLengths as $field => $lengths) {
                        $min = $lengths[0];
                        $max = $lengths[1];

                        if(strlen($_POST[$field]) < $min || strlen($_POST[$field]) > $max) {
                            $translatedField = $core->getTranslator()->translate('system.register.field.' . $field);

                            $core->addError('system.errors.length',
                                array('min' => $min, 'max' => $max, 'field' => $translatedField));
                            $success = false;
                        }
                    }

                    if($success) {
                        // Validate check password field
                        if ($_POST['password'] == $_POST['check_password']) {
                            // Validate check email field
                            if ($_POST['mailaddress'] == $_POST['check_mailaddress']) {
                                $em = $core->getServerDatabase('account')->getEntityManager();
                                // Check if id already in use
                                $tmp = $em->getRepository('Quantum\\DBO\\Account')->findOneBy(
                                    array('login' => $_POST['acc_name'])
                                );
                                if($tmp == null) {
                                    // Check if display name is already in use
                                    $emI = $core->getInternalDatabase()->getEntityManager();
                                    $tmp = $emI->getRepository('Quantum\\DBO\\InternalAccount')->findOneBy(
                                        array('displayName' => $_POST['visible_name'])
                                    );

                                    if($tmp == null) {
                                        // Everything is fine, create account
                                        $account = new Account();
                                        // todo implement hook for salt or something else
                                        $account->setLogin($_POST['acc_name']);
                                        $account->setPassword($core->createHash($_POST['password'], $account));
                                        $account->setEmail($_POST['mailaddress']);
                                        $account->setSocialId($_POST['deletecode']); // todo check if it is really social id
                                        $account->setCreateTime(new \DateTime());
                                        $account->setStatus('OK'); // todo implement account validation (e.g email)

                                        $em->persist($account);
                                        $em->flush();

                                        // Create internal details
                                        $internalAccount = new InternalAccount();
                                        $internalAccount->setAccountId($account->getId());
                                        $internalAccount->setDisplayName($_POST['visible_name']);

                                        $emI->persist($internalAccount);
                                        $emI->flush();

                                        $smarty->assign('register_success', true);
                                    } else {
                                        $core->addError('system.register.display_name_check');
                                    }
                                } else {
                                    $core->addError('system.register.login_check');
                                }
                            } else {
                                $core->addError('system.register.mail_check');
                            }
                        } else {
                            $core->addError('system.register.password_check');
                        }
                    }
                } else {
                    $core->addError('system.errors.captcha');
                }
            }
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
        return 'pages/register.tpl';
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