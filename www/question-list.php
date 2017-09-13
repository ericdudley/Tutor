<ul class="pure-menu-list">
    <?php
        foreach(Question::getAll() as $idx=>$q){
            echo "<li class='pure-menu-item'>
<a class='pure-menu-link' href='#'>{$idx} {$q->name}</a>".
                ((Tutor::verify($_SERVER['uid'])) ?
                "<a class='pure-button delete-question' href='delete-question.php?id={$q->id}'>Delete</a>" : "") .
"</li>";
        }
    ?>
</ul>