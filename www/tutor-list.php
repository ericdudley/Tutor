<ul class="pure-menu-list">
    <?php
        foreach(Tutor::getActive() as $idx=> $t){
            echo "<li class='pure-menu-item'>
<a class='pure-menu-link' href='#'>{$t->name}</a></li>";
        }
    ?>
</ul>