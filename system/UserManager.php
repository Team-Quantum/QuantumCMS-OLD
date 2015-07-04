<?php

namespace Quantum;

use Quantum\DBO\Account;
use Quantum\DBO\Group;
use Quantum\DBO\GroupPrivilege;
use Quantum\DBO\InternalAccount;
use Quantum\DBO\UserGroup;

class UserManager {

    /**
     * @var null|InternalAccount
     */
    private $currentInternalAccount = null;

    /**
     * @var null|Account
     */
    private $currentAccount = null;

    /**
     * @var array
     */
    private $groups = array();

    /**
     * @var array
     */
    private $privileges = array();

    /**
     * @var Core
     */
    private $core;

    /**
     * @param $core Core
     */
    public function __construct($core) {
        $this->core = $core;

        if($this->currentAccount != null)
            return $this->currentAccount;

        // Don't call to database here
        if($_SESSION['aid'] != null) {
            $em = $core->getServerDatabase('account')->getEntityManager();
            $this->currentAccount = $em->getRepository('\\Quantum\\DBO\\Account')->findOneBy(array(
                'id' => $_SESSION['aid'],
                'login' => $_SESSION['lid'],
                'password' => $_SESSION['pass']
            ));

            if ($this->currentAccount !== null) {
                $this->loadInternalAccount();
            }
        }
    }

    /**
     * @return null|InternalAccount
     */
    public function getCurrentInternalAccount() {
        return $this->currentInternalAccount;
    }

    /**
     * @return null|Account
     */
    public function getCurrentAccount() {
        return $this->currentAccount;
    }

    /**
     * @param $account Account
     */
    public function setAccount($account) {
        if($account == null) {
            $_SESSION['aid'] = null;
            $_SESSION['lid'] = null;
            $_SESSION['pass'] = null;
        } else {
            $_SESSION['aid'] = $account->getId();
            $_SESSION['lid'] = $account->getLogin();

            // Sessions are stored on server side -> no attack possibility
            // Also I store it to stop every session when the password
            // got changed (security)
            $_SESSION['pass'] = $account->getPassword();
        }

        $this->currentAccount = $account;

        if($this->currentAccount !== null) {
            // Load internal account
            $this->loadInternalAccount();
        }
    }

    /**
     * Load the internal account
     */
    public function loadInternalAccount() {
        $emI = $this->core->getInternalDatabase()->getEntityManager();
        $this->currentInternalAccount = $emI->getRepository('\\Quantum\\DBO\\InternalAccount')->findOneBy(array(
            'accountId' => $this->currentAccount->getId()
        ));

        if($this->currentInternalAccount == null)
            return;

        // Load groups
        $userGroups = $emI->getRepository('\\Quantum\\DBO\\UserGroup')->findBy(array(
            'userId' => $this->currentInternalAccount->getId()
        ));

        /** @var $userGroup UserGroup */
        foreach($userGroups as $userGroup) {
            $this->groups[] = $emI->find('\\Quantum\\DBO\\Group', $userGroup->getGroupId());
        }

        // Load privileges
        /** @var $group Group */
        foreach($this->groups as $group) {
            $groupPrivileges = $emI->getRepository('\\Quantum\\DBO\\GroupPrivilege')->findBy(array(
                'groupId' => $group->getId()
            ));

            /** @var $groupPrivilege GroupPrivilege */
            foreach($groupPrivileges as $groupPrivilege) {
                $this->privileges[] = $emI->find('\\Quantum\\DBO\\Privilege', $groupPrivilege->getId());
            }
        }
    }

    /**
     * Check if the user has the requested privilege
     * @param $neededPrivilege string
     * @return bool
     */
    public function hasPrivilege($neededPrivilege) {
        // todo implement
        return false;
    }


}