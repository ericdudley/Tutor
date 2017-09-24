<?php
    require_once "Question.php";
    require_once "SQLiteConnection.php";
?>
<ul>
    <?php
    $questions = Question::getAllActive();
    if(count($questions) == 0) {
        echo "<p>There are no help requests.</p>";

    }
    else {
        foreach ($questions as $idx => $q) {
            echo "<li>
<a class='pure-button question-elem' href='question-detail.php?id={$q->id}'>
<span class='question-elem-num'>{$idx}</span> {$q->name}</a></li>";
        }
    }
    ?>
</ul>