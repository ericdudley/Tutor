<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 9/10/17
 * Time: 1:03 PM
 */

class Question
{
    public $id;
    public $user;
    public $clss;
    public $assn;
    public $text;

    /**
     * Question constructor.
     * @param $user
     * @param $clss
     * @param $assn
     * @param $text
     */
    public function __construct($id, $user, $clss, $assn, $text)
    {
        $this->id = $id;
        $this->user = $user;
        $this->clss = $clss;
        $this->assn = $assn;
        $this->text = $text;
    }

}