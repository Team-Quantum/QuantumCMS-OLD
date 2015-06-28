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

}