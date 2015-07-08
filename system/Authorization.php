<?php
namespace Quantum;

trait Authorization {

    protected $neededPrivileges = false;

    /**
     * Authorize current user. If it fails it will redirect him to the homepage
     *
     * @param $core
     * @return bool
     */
    public function authorize($core)
    {
        $rights = false;

        if($core->getAccount() != null) {
            $neededPrivilege = property_exists($this, 'neededPrivileges') ? $this->neededPrivileges : null;

            if($neededPrivilege == null) {
                $rights = true;
            } else {
                $rights = $core->getUserManager()->hasPrivilege($neededPrivilege);
            }
        }
        return $rights;
    }
}