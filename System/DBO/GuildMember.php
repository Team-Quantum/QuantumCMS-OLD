<?php

namespace Quantum\DBO;

class GuildMember {

    /**
     * @var integer
     */
    private $pid;

    /**
     * @var integer
     */
    private $guild_id;

    /**
     * @return int
     */
    public function getPid() {
        return $this->pid;
    }

    /**
     * @param int $pid
     */
    public function setPid($pid) {
        $this->pid = $pid;
    }

    /**
     * @return int
     */
    public function getGuildId() {
        return $this->guild_id;
    }

    /**
     * @param int $guild_id
     */
    public function setGuildId($guild_id) {
        $this->guild_id = $guild_id;
    }

}