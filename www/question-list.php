<ul class="pure-menu-list">
    <?php
        foreach(Question::getAll() as $idx=>$q){
            echo "<li class='pure-menu-item'>
<a class='pure-menu-link' href='#'>{$idx} {$q->name}</a></li>";
        }
    ?>
</ul>