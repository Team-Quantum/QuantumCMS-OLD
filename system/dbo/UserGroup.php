<?php

namespace Quantum\DBO;

class UserGroup {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $groupId;

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
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId) {
        $this->userId = $userId;
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



}