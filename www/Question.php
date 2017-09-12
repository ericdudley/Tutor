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
    public $qtext;

    /**
     * Question constructor.
     * @param $user
     * @param $clss
     * @param $assn
     * @param $text
     */
    public function __construct($id, $user, $clss, $assn, $qtext)
    {
        $this->id = $id;
        $this->user = $user;
        $this->clss = $clss;
        $this->assn = $assn;
        $this->qtext = $qtext;
    }

    public static function create($user, $clss, $assn, $qtext)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "INSERT INTO Question(user, clss, assn, qtext) 
VALUES (:user, :clss, :assn, :qtext);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->bindParam(':clss', $clss, PDO::PARAM_STR);
            $stmt->bindParam(':assn', $assn, PDO::PARAM_STR);
            $stmt->bindParam(':qtext', $qtext, PDO::PARAM_STR);
            $stmt->execute();
            return new Question($db->lastInsertId(), $user, $clss, $assn, $qtext);
        }
        return null;
    }

    public static function getAll()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $questions = array();
            $sql = "SELECT id, user, clss, assn, qtext FROM Question;";
            foreach ($db->query($sql) as $row) {
                array_push($questions, new Question($row['id'], $row['user'], $row['clss'], $row['assn'], $row['qtext']));
            }
            return $questions;
        }
        return null;
    }

}