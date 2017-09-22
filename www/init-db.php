<?php
include 'head.php';
if($_POST['key'] == null){
    echo 'No key provided!';
    exit();
} else{
    if(hash('sha256', $_POST['key']) == '62f2a88a17dbe9403682a3195e76ba5473e3a04736ef795169e1e4b33246130d'){
        $db = SQLiteConnection::connect();
        if ($db != null) {
            foreach (Config::CREATE_TABLE_STRINGS as $str) {
                $db->exec($str);
            }
        }
        echo 'Database was refreshed.';
    } else{
        echo 'incorrect key';
    }
}