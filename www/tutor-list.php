<?php
    require_once "Tutor.php";
    require_once "SQLiteConnection.php";
?>
<ul>
    <?php
    $active = Tutor::getActive();
    if (count($active) == 0) {
        echo "<p>No tutors are active.</p>";
    } else {
        foreach ($active as $idx => $t) {
            $img_path = file_exists("profile_pics/" . $t->username . ".jpg") ?
                "profile_pics/" . $t->username . ".jpg" : "profile_pics/default.jpg";
            echo "<li>
<img class='profile_img' src='".$img_path."'>
<p>{$t->name}</p></li>";
        }
    }
    ?>
</ul>