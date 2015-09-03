<?php

namespace Quantum\DBO;

use Quantum\Core;

class Item {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $owner_id;

    /**
     * @var string
     */
    protected $window;

    /**
     * @var int
     */
    protected $pos;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var int
     */
    protected $vnum;

    /**
     * @var int
     */
    protected $socket0;

    /**
     * @var int
     */
    protected $socket1;

    /**
     * @var int
     */
    protected $socket2;

    /**
     * @var int
     */
    protected $socket3;

    /**
     * @var int
     */
    protected $socket4;

    /**
     * @var int
     */
    protected $socket5;

    /**
     * @var int
     */
    protected $attrtype0;

    /**
     * @var int
     */
    protected $attrvalue0;

    /**
     * @var int
     */
    protected $attrtype1;

    /**
     * @var int
     */
    protected $attrvalue1;

    /**
     * @var int
     */
    protected $attrtype2;

    /**
     * @var int
     */
    protected $attrvalue2;

    /**
     * @var int
     */
    protected $attrtype3;

    /**
     * @var int
     */
    protected $attrvalue3;

    /**
     * @var int
     */
    protected $attrtype4;

    /**
     * @var int
     */
    protected $attrvalue4;

    /**
     * @var int
     */
    protected $attrtype5;

    /**
     * @var int
     */
    protected $attrvalue5;

    /**
     * @var int
     */
    protected $attrtype6;

    /**
     * @var int
     */
    protected $attrvalue6;

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
    public function getOwnerId() {
        return $this->owner_id;
    }

    /**
     * @param int $owner_id
     */
    public function setOwnerId($owner_id) {
        $this->owner_id = $owner_id;
    }

    /**
     * @return string
     */
    public function getWindow() {
        return $this->window;
    }

    /**
     * @param string $window
     */
    public function setWindow($window) {
        $this->window = $window;
    }

    /**
     * @return int
     */
    public function getPos() {
        return $this->pos;
    }

    /**
     * @param int $pos
     */
    public function setPos($pos) {
        $this->pos = $pos;
    }

    /**
     * @return int
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count) {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getVnum() {
        return $this->vnum;
    }

    /**
     * @param int $vnum
     */
    public function setVnum($vnum) {
        $this->vnum = $vnum;
    }

    /**
     * @return int
     */
    public function getSocket0() {
        return $this->socket0;
    }

    /**
     * @param int $socket0
     */
    public function setSocket0($socket0) {
        $this->socket0 = $socket0;
    }

    /**
     * @return int
     */
    public function getSocket1() {
        return $this->socket1;
    }

    /**
     * @param int $socket1
     */
    public function setSocket1($socket1) {
        $this->socket1 = $socket1;
    }

    /**
     * @return int
     */
    public function getSocket2() {
        return $this->socket2;
    }

    /**
     * @param int $socket2
     */
    public function setSocket2($socket2) {
        $this->socket2 = $socket2;
    }

    /**
     * @return int
     */
    public function getSocket3() {
        return $this->socket3;
    }

    /**
     * @param int $socket3
     */
    public function setSocket3($socket3) {
        $this->socket3 = $socket3;
    }

    /**
     * @return int
     */
    public function getSocket4() {
        return $this->socket4;
    }

    /**
     * @param int $socket4
     */
    public function setSocket4($socket4) {
        $this->socket4 = $socket4;
    }

    /**
     * @return int
     */
    public function getSocket5() {
        return $this->socket5;
    }

    /**
     * @param int $socket5
     */
    public function setSocket5($socket5) {
        $this->socket5 = $socket5;
    }

    /**
     * @return int
     */
    public function getAttrtype0() {
        return $this->attrtype0;
    }

    /**
     * @param int $attrtype0
     */
    public function setAttrtype0($attrtype0) {
        $this->attrtype0 = $attrtype0;
    }

    /**
     * @return int
     */
    public function getAttrvalue0() {
        return $this->attrvalue0;
    }

    /**
     * @param int $attrvalue0
     */
    public function setAttrvalue0($attrvalue0) {
        $this->attrvalue0 = $attrvalue0;
    }

    /**
     * @return int
     */
    public function getAttrtype1() {
        return $this->attrtype1;
    }

    /**
     * @param int $attrtype1
     */
    public function setAttrtype1($attrtype1) {
        $this->attrtype1 = $attrtype1;
    }

    /**
     * @return int
     */
    public function getAttrvalue1() {
        return $this->attrvalue1;
    }

    /**
     * @param int $attrvalue1
     */
    public function setAttrvalue1($attrvalue1) {
        $this->attrvalue1 = $attrvalue1;
    }

    /**
     * @return int
     */
    public function getAttrtype2() {
        return $this->attrtype2;
    }

    /**
     * @param int $attrtype2
     */
    public function setAttrtype2($attrtype2) {
        $this->attrtype2 = $attrtype2;
    }

    /**
     * @return int
     */
    public function getAttrvalue2() {
        return $this->attrvalue2;
    }

    /**
     * @param int $attrvalue2
     */
    public function setAttrvalue2($attrvalue2) {
        $this->attrvalue2 = $attrvalue2;
    }

    /**
     * @return int
     */
    public function getAttrtype3() {
        return $this->attrtype3;
    }

    /**
     * @param int $attrtype3
     */
    public function setAttrtype3($attrtype3) {
        $this->attrtype3 = $attrtype3;
    }

    /**
     * @return int
     */
    public function getAttrvalue3() {
        return $this->attrvalue3;
    }

    /**
     * @param int $attrvalue3
     */
    public function setAttrvalue3($attrvalue3) {
        $this->attrvalue3 = $attrvalue3;
    }

    /**
     * @return int
     */
    public function getAttrtype4() {
        return $this->attrtype4;
    }

    /**
     * @param int $attrtype4
     */
    public function setAttrtype4($attrtype4) {
        $this->attrtype4 = $attrtype4;
    }

    /**
     * @return int
     */
    public function getAttrvalue4() {
        return $this->attrvalue4;
    }

    /**
     * @param int $attrvalue4
     */
    public function setAttrvalue4($attrvalue4) {
        $this->attrvalue4 = $attrvalue4;
    }

    /**
     * @return int
     */
    public function getAttrtype5() {
        return $this->attrtype5;
    }

    /**
     * @param int $attrtype5
     */
    public function setAttrtype5($attrtype5) {
        $this->attrtype5 = $attrtype5;
    }

    /**
     * @return int
     */
    public function getAttrvalue5() {
        return $this->attrvalue5;
    }

    /**
     * @param int $attrvalue5
     */
    public function setAttrvalue5($attrvalue5) {
        $this->attrvalue5 = $attrvalue5;
    }

    /**
     * @return int
     */
    public function getAttrtype6() {
        return $this->attrtype6;
    }

    /**
     * @param int $attrtype6
     */
    public function setAttrtype6($attrtype6) {
        $this->attrtype6 = $attrtype6;
    }

    /**
     * @return int
     */
    public function getAttrvalue6() {
        return $this->attrvalue6;
    }

    /**
     * @param int $attrvalue6
     */
    public function setAttrvalue6($attrvalue6) {
        $this->attrvalue6 = $attrvalue6;
    }

    // TODO: fix
    public function format($value){

        $val = intval($value);

        return number_format($val, 0,
            Core::getInstance()->getTranslator()->translate('system.number.dec'),
            Core::getInstance()->getTranslator()->translate('system.number.thousand'));
    }

}