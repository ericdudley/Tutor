<ul>
    <?php
    $active = Tutor::getActive();
    if (count($active) == 0) {
        echo "<p>No tutors are active.</p>";
    } else {
        foreach ($active as $idx => $t) {
            echo "<li>
<img class='profile_img' src='profile_pics/" . $_SERVER["uid"] . ".jpg'>
<p>{$t->name}</p></li>";
        }
    }
    ?>
</ul>