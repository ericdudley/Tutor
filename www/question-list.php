<ul class="pure-menu-list">
    <?php
        foreach(Question::getAll() as $q){
            echo "<li class='pure-menu-item'>
<a class='pure-menu-link' href='#'>{$q->id} {$q->user}</a></li>";
        }
    ?>
</ul>