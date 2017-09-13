<?php
include "head.php";
if($_GET['username'] != null) {
    Tutor::updateLastActive($_GET['username']);
    include "redirect.php";
} else {
    echo "<a class=\"pure-button\" href=\".\">Back</a>
<p>No tutor username specified!</p>";
}