<?php
include "head.php";
include "tutors-only.php";
if($_GET['username'] != null) {
    Tutor::updateLastActive($_GET['username'], true);
    include "redirect.php";
} else {
    echo "<a class=\"pure-button\" href=\".\">Back</a>
<p>No tutor username specified!</p>";
}