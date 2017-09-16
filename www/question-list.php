<?php
    require_once "Question.php";
    require_once "SQLiteConnection.php";
?>
<ul>
    <?php
    $questions = Question::getAll();
    if(count($questions) == 0) {
        echo "<p>There are no help requests.</p>";

    }
    else {
        foreach ($questions as $idx => $q) {
            echo "<li>
<a class='pure-button' href='question-detail.php?id={$q->id}'>{$idx} {$q->name}</a></li>";
        }
    }
    ?>
</ul>