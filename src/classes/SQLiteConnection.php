<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 9/11/17
 * Time: 6:32 PM
 */
include "Config.php";


class SQLiteConnection {
    /**
     * PDO instance
     * @var \PDO
     */
    private static $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public static function connect() {
        if (SQLiteConnection::$pdo == null) {
            SQLiteConnection::$pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        return SQLiteConnection::$pdo;
    }
}