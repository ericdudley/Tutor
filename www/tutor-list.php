<ul>
    <?php
        foreach(Tutor::getActive() as $idx=> $t){
            echo "<li>
<img class='profile_img' src='profile_pics/" . $_SERVER["uid"] . ".jpg'>
<p>{$t->name}</p></li>";
        }
    ?>
</ul>