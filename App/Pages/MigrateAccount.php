<?php
namespace App\Pages;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Quantum\DBO\InternalAccount;

class MigrateAccount extends BasePage {
    use Authorization;
    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty) {
        $smarty->assign('disable', $core->getUserManager()->getCurrentInternalAccount() !== null);

        if($core->getUserManager()->getCurrentInternalAccount() === null) {
            if(isset($_POST['action']) && $_POST['action'] == 'system-migrate-account') {
                if(!empty($_POST['visible_name'])) {
                    if(strlen($_POST['visible_name']) < 8 || strlen($_POST['visible_name']) > 16) {
                        $core->addError('system.errors.length',
                            array('min' => 8,
                                'max' => 16,
                                'field' => $core->getTranslator()->translate('system.register.field.visible_name')
                            )
                        );
                    } else {
                        $em = $core->getInternalDatabase()->getEntityManager();
                        // Check if name is in use
                        $tmp = $em->getRepository('\\Quantum\\DBO\\InternalAccount')->findOneBy(array(
                            'displayName' => $_POST['visible_name']
                        ));
                        if($tmp == null) {
                            // Create internal data
                            $internalAccount = new InternalAccount();
                            $internalAccount->setAccountId($core->getUserManager()->getCurrentAccount()->getId());
                            $internalAccount->setDisplayName($_POST['visible_name']);

                            $em->persist($internalAccount);
                            $em->flush();

                            $core->getUserManager()->loadInternalAccount();
                            $this->redirect('Home');
                        } else {
                            $core->addError('system.register.display_name_check');
                        }
                    }
                } else {
                    $core->addError('system.register.missing.visible_name');
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
    public function getTemplate($core, $smarty) {
        return 'pages/migrate_account.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }
}