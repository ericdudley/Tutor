<?php
include "head.php";
if($_GET['id'] != null) {
    Question::delete($_GET['id']);
    include "redirect.php";
} else {
    echo "<p>No question id specified!</p>
        <a class=\"pure-button\" href=\".\">Back</a>
";
}