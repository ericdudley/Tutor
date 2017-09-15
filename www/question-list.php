<?php
    require_once "Tutor.php";
    require_once "Question.php";
    require_once "SQLiteConnection.php";
?>
<div id="question-list-container">
<ul>
    <?php
    $questions = Question::getAll();
    if(count($questions) == 0) {
        echo "<p>There are no help requests.</p>";

    }
    else {
        foreach ($questions as $idx => $q) {
            echo "<li>
<a class='pure-button' href='question-detail.php?id={$q->id}'>{$idx} {$q->name}</a>" .
                ((Tutor::verify($_SERVER['uid'])) ?
                    "<a class='pure-button delete-question' href='delete-question.php?id={$q->id}'>Delete</a>" : "") .
                "</li>";
        }
    }
    ?>
</ul>
</div>