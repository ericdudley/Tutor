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

    public static function create($username, $name, $isTutor){
        $db = SQLiteConnection::connect();
        if ($db != null) {
            $sql = "INSERT INTO User(username, name, isTutor) 
VALUES (:username, :name, :isTutor);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':isTutor', $isTutor, PDO::PARAM_STR);
            $stmt->execute();
        }
        return null;
    }
}