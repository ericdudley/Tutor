<?php
include "head.php";
include "tutors-only.php";
Tutor::updateLastActive($_SERVER['uid']);
if($_GET['id'] != null) {
    Question::delete($_GET['id']);
    include "redirect.php";
} else {
    echo "<p>No question id specified!</p>
        <a class=\"pure-button\" href=\".\">Back</a>
";
}