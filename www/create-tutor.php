<?php
include "head.php";
include "tutors-only.php";
$t = Tutor::create($_POST['username'], $_POST['name']);
if($t != null) {
    echo '<script type="text/javascript">
           window.location = "tutor-admin.php";
      </script>';
} else {
    echo "An error occurred when creating tutor!";
}