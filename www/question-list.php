<ul>
    <?php
        foreach(Question::getAll() as $idx=>$q){
            echo "<li>
<a href='question-detail.php?id={$q->id}'>{$idx} {$q->name}</a>".
                ((Tutor::verify($_SERVER['uid'])) ?
                "<a class='pure-button delete-question' href='delete-question.php?id={$q->id}'>Delete</a>" : "") .
"</li>";
        }
    ?>
</ul>