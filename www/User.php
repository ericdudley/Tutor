<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 9/11/17
 * Time: 7:36 PM
 */

class User
{
    public $username;
    public $name;
    public $isTutor;

    /**
     * User constructor.
     * @param $username
     * @param $name
     * @param $isTutor
     */
    public function __construct($username, $name, $isTutor)
    {
        $this->username = $username;
        $this->name = $name;
        $this->isTutor = $isTutor;
    }
}