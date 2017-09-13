<?php
/**
 * Created by PhpStorm.
 * Tutor: eric
 * Date: 9/10/17
 * Time: 1:03 PM
 */

class Question
{
    public $id;
    public $username;
    public $name;
    public $clss;
    public $assn;
    public $qtext;

    /**
     * Question constructor.
     * @param $username
     * @param $clss
     * @param $assn
     * @param $text
     */
    public function __construct($id, $username, $name, $clss, $assn, $qtext)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->clss = $clss;
        $this->assn = $assn;
        $this->qtext = $qtext;
    }

    public static function create($username, $name, $clss, $assn, $qtext)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "INSERT INTO Question(username, name, clss, assn, qtext) 
VALUES (:username, :name, :clss, :assn, :qtext);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':clss', $clss, PDO::PARAM_STR);
            $stmt->bindParam(':assn', $assn, PDO::PARAM_STR);
            $stmt->bindParam(':qtext', $qtext, PDO::PARAM_STR);
            $stmt->execute();
            return new Question($db->lastInsertId(), $username, $name, $clss, $assn, $qtext);
        }
        return null;
    }

    public static function delete($id)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "DELETE FROM Question WHERE id=:id;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        return false;
    }


    public static function get($id)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = 'SELECT * FROM Question WHERE id=:id LIMIT 1';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row == null){return null;}
            return new Question($id, $row['username'], $row['name'], $row['clss'], $row['assn'], $row['qtext']);
        }
        return null;
    }

    public static function getAll()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $questions = array();
            $sql = "SELECT id, username, name, clss, assn, qtext FROM Question;";
            foreach ($db->query($sql) as $row) {
                array_push($questions, new Question($row['id'], $row['username'], $row['name'], $row['clss'], $row['assn'], $row['qtext']));
            }
            return $questions;
        }
        return null;
    }

}