<?php
include "head.php";
$id = $_GET['id'];
if ($id == null) {
    echo "<p>No question id specified!</p>";
    exit();
} else {
    $q = Question::get($id);
    if ($q == null) {
        echo "<p>Question {$id} doesn't exist!</p>";
        exit();
    }
}
if ($q->username != $_SERVER['uid']) {
    include "tutors-only.php";
}
Tutor::updateLastActive($_SERVER['uid']);
if($_GET['id'] != null) {
    Question::delete($_GET['id'], $_SERVER['uid']);
    include "redirect.php";
} else {
    echo "<p>No question id specified!</p>
        <a class=\"pure-button\" href=\".\">Back</a>
";
}