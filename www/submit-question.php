<?php
include "head.php";
$question = Question::create($_SERVER['uid'], $_SERVER['givenName'].' '.$_SERVER['sn'], $_POST['clss'], $_POST['assn'], $_POST['qtext']);
if($question != null){
    include "redirect.php";
}
else{
    echo 'An error occurred when submitting question!';
}