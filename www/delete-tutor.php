<?php
include "head.php";
include "tutors-only.php";
Tutor::updateLastActive($_SERVER['uid']);
if($_GET['username'] != null) {
    Tutor::delete($_GET['username']);
    echo '<script type="text/javascript">
           window.location = "tutor-admin.php";
      </script>';
} else {
    echo "<p>No tutor username specified!</p>
        <a class=\"pure-button\" href=\".\">Back</a>
";
}