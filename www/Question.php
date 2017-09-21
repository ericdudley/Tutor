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
    public $created_time;
    public $deleted_time;
    public $deleted_by;

    /**
     * Question constructor.
     * @param $username
     * @param $clss
     * @param $assn
     * @param $text
     */
    public function __construct($id, $username, $name, $clss, $assn, $qtext, $created_time, $deleted_time, $deleted_by)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->clss = $clss;
        $this->assn = $assn;
        $this->qtext = $qtext;
        $this->created_time = $created_time;
        $this->deleted_time = $deleted_time;
        $this->deleted_by = $deleted_by;
    }

    public static function create($username, $name, $clss, $assn, $qtext)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "INSERT INTO Question(username, name, clss, assn, qtext, created_time) 
VALUES (:username, :name, :clss, :assn, :qtext, :created_time);";
            $stmt = $db->prepare($sql);
            $ct = time();
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':clss', $clss, PDO::PARAM_STR);
            $stmt->bindParam(':assn', $assn, PDO::PARAM_STR);
            $stmt->bindParam(':qtext', $qtext, PDO::PARAM_STR);
            $stmt->bindParam(':created_time', $ct, PDO::PARAM_INT);
            $stmt->execute();
            return new Question($db->lastInsertId(), $username, $name, $clss, $assn, $qtext, $ct, null, null);
        }
        return null;
    }

    public static function delete($id, $deleted_by)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "UPDATE Question SET 
deleted_time=:time, deleted_by=:deleted_by 
WHERE id=:id;";
            $stmt = $db->prepare($sql);
            $time = time();
            $stmt->bindParam(':time', $time, PDO::PARAM_INT);
            $stmt->bindParam(':deleted_by', $deleted_by, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
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
            return new Question($id, $row['username'], $row['name'], $row['clss'], $row['assn'], $row['qtext'], $row['created_time'], $row['deleted_time'], $row['deleted_by']);
        }
        return null;
    }

    public static function getAll()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $questions = array();
            $sql = "SELECT * FROM Question;";
            foreach ($db->query($sql) as $row) {
                array_push($questions, new Question($row['id'], $row['username'], $row['name'], $row['clss'], $row['assn'], $row['qtext'], $row['created_time'], $row['deleted_time'], $row['deleted_by']));
            }
            return $questions;
        }
        return null;
    }

    public static function getAllActive()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $questions = array();
            $sql = "SELECT * FROM Question WHERE strftime('%s','now') - created_time < 7200 AND deleted_time is NULL;";
            foreach ($db->query($sql) as $row) {
                array_push($questions, new Question($row['id'], $row['username'], $row['name'], $row['clss'], $row['assn'], $row['qtext'], $row['created_time'], $row['deleted_time'], $row['deleted_by']));
            }
            return $questions;
        }
        return null;
    }

    public static function isActive($id)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "SELECT * FROM Question
WHERE strftime('%s','now') - created_time < 7200 AND deleted_time is NULL AND id=:id LIMIT 1;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row == null){return false;}
            return true;
        }
        return false;
    }

    public static function countAll()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "SELECT COUNT(*) as count FROM Question;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int)$row['count'];
        }
        return null;
    }

    public static function avgWaitTime()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "SELECT avg(deleted_time - created_time) as avgwait FROM Question WHERE deleted_time is not NULL ;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int)$row['avgwait'] / 60;
        }
        return null;
    }

    public static function bestTutor()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "select name from Tutor 
where username in 
(select deleted_by as username from 
(select deleted_by, num, max(num) as maxnum from 
(select deleted_by, count(*) as num from Question group by deleted_by)) 
where num=maxnum) limit 1;
";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['name'];
        }
        return null;
    }


}