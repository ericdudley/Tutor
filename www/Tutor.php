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

    /**
     * Tutor constructor.
     * @param $username
     * @param $name
     * @param $isTutor
     */
    public function __construct($username, $name)
    {
        $this->username = $username;
        $this->name = $name;
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
}