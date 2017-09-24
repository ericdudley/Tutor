<?php
    require_once "Question.php";
    require_once "SQLiteConnection.php";
?>
<ul id="question-ul">
    <?php
    $questions = Question::getAllActive();
    if(count($questions) == 0) {
        echo "<p>There are no help requests.</p>";

    }
    else {
        foreach ($questions as $idx => $q) {
            $extra_class = "";
            if($q->username == $_SERVER['uid']){
                $extra_class = "own-question";
            }
            echo "<li data-username='".$q->username."' data-position='{$idx}'>
<a class='pure-button question-elem ".$extra_class."' href='question-detail.php?id={$q->id}'>
<span class='question-elem-num'>{$idx}</span> {$q->name}</a></li>";
        }
    }
    ?>
</ul>