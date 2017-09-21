<?php
include 'head.php';
$db = SQLiteConnection::connect();
if ($db != null) {
    foreach (Config::CREATE_TABLE_STRINGS as $str) {
        $db->exec($str);
    }
}