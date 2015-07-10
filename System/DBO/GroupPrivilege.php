<?php

namespace Quantum\DBO;

class GroupPrivilege {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $groupId;

    /**
     * @var integer
     */
    private $privilegeId;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getGroupId() {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId) {
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getPrivilegeId() {
        return $this->privilegeId;
    }

    /**
     * @param int $privilegeId
     */
    public function setPrivilegeId($privilegeId) {
        $this->privilegeId = $privilegeId;
    }



}