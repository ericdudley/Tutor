<ul>
    <?php
        foreach(Question::getAll() as $q){
            echo "<li>{$q->id} {$q->user}</li>";
        }
    ?>
</ul>