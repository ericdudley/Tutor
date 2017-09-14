<ul>
    <?php
        foreach(Tutor::getActive() as $idx=> $t){
            echo "<li>
<ahref='#'>{$t->name}</a></li>";
        }
    ?>
</ul>