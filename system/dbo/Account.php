<?php

namespace Quantum\DBO;

class Account {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $real_name;

    /**
     * @var string
     */
    protected $social_id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var date
     */
    protected $create_time;

    /**
     * @var string
     */
    protected $question1;

    /**
     * @var string
     */
    protected $answer1;

    /**
     * @var string
     */
    protected $question2;

    /**
     * @var string
     */
    protected $answer2;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var date
     */
    protected $availDt;

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
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login) {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRealName() {
        return $this->real_name;
    }

    /**
     * @param string $real_name
     */
    public function setRealName($real_name) {
        $this->real_name = $real_name;
    }

    /**
     * @return string
     */
    public function getSocialId() {
        return $this->social_id;
    }

    /**
     * @param string $social_id
     */
    public function setSocialId($social_id) {
        $this->social_id = $social_id;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return date
     */
    public function getCreateTime() {
        return $this->create_time;
    }

    /**
     * @param date $create_time
     */
    public function setCreateTime($create_time) {
        $this->create_time = $create_time;
    }

    /**
     * @return string
     */
    public function getQuestion1() {
        return $this->question1;
    }

    /**
     * @param string $question1
     */
    public function setQuestion1($question1) {
        $this->question1 = $question1;
    }

    /**
     * @return string
     */
    public function getAnswer1() {
        return $this->answer1;
    }

    /**
     * @param string $answer1
     */
    public function setAnswer1($answer1) {
        $this->answer1 = $answer1;
    }

    /**
     * @return string
     */
    public function getQuestion2() {
        return $this->question2;
    }

    /**
     * @param string $question2
     */
    public function setQuestion2($question2) {
        $this->question2 = $question2;
    }

    /**
     * @return string
     */
    public function getAnswer2() {
        return $this->answer2;
    }

    /**
     * @param string $answer2
     */
    public function setAnswer2($answer2) {
        $this->answer2 = $answer2;
    }

    /**
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return date
     */
    public function getAvailDt() {
        return $this->availDt;
    }

    /**
     * @param date $availDt
     */
    public function setAvailDt($availDt) {
        $this->availDt = $availDt;
    }

}