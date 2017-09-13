<?php
/**
 * Created by PhpStorm.
 * Tutor: eric
 * Date: 9/11/17
 * Time: 7:36 PM
 */

class Tutor
{
    public $username;
    public $name;
    public $last_active;

    /**
     * Tutor constructor.
     * @param $username
     * @param $name
     * @param $isTutor
     */
    public function __construct($username, $name, $last_active)
    {
        $this->username = $username;
        $this->name = $name;
        $this->last_active = $last_active;
    }

    public static function create($username, $name){
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "INSERT INTO Tutor(username, name) 
VALUES (:username, :name);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();

            return new Tutor($username, $name);
        }
        return null;
    }

    public static function verify($username){
        if(strpos($_SERVER['ritEduAffiliation'], 'Employee') !== false){
            return true;
        }
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = 'SELECT * FROM Tutor WHERE username LIKE :username LIMIT 1';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row != null){return true;}

        }
        return false;
    }

    public static function getAll()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $tutors = array();
            $sql = "SELECT username, name, last_active FROM Tutor;";
            foreach ($db->query($sql) as $row) {
                array_push($tutors, new Tutor($row['username'], $row['name'], $row['last_active']));
            }
            return $tutors;
        }
        return null;
    }

    public static function getActive()
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $tutors = array();
            $sql = "SELECT username, name, last_active FROM Tutor
WHERE strftime('%s','now') - last_active < 3600;";
            foreach ($db->query($sql) as $row) {
                array_push($tutors, new Tutor($row['username'], $row['name'], $row['last_active']));
            }
            return $tutors;
        }
        return null;
    }

    public static function isActive($username)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $tutors = array();
            $sql = "SELECT * FROM Tutor
WHERE strftime('%s','now') - last_active < 3600 AND username LIKE :username LIMIT 1;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row == null){return false;}
            return true;
        }
        return false;
    }

    public static function updateLastActive($username, $null = false)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "UPDATE Tutor SET last_active=:time WHERE username=:username;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            if($null){
                $time = 0;
                $stmt->bindParam(':time', $time, PDO::PARAM_INT);
            }else{
                $stmt->bindParam(':time', time(), PDO::PARAM_INT);
            }
            $stmt->execute();
            return true;
        }
        return false;
    }

    public static function delete($username)
    {
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $tutors = array();
            $sql = "DELETE FROM Tutor WHERE username LIKE :username;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        return false;
    }
}