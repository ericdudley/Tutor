<?php
include "head.php";
if($_SERVER['uid'] == null){
    $_SERVER['uid'] = "erd5693";
}
$question = Question::create($_SERVER['uid'], $_POST['clss'], $_POST['assn'], $_POST['qtext']);
if($question != null){
    echo '<script type="text/javascript">
           window.location = "."
      </script>';
}
else{
    echo 'An error occurred when submitting question!';
}