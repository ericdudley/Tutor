<?php
include "head.php";

echo '
<div class="content">
';
$id = $_GET['id'];
if ($id == null) {
    echo "<p>No question id specified!</p>";
    exit();
} else {
    $q = Question::get($id);
    if ($q == null) {
        echo "<p>Question {$id} doesn't exist!</p>";
        exit();
    }
}
if ($q->username != $_SERVER['uid']) {
    include "tutors-only.php";
}
$img_path = file_exists("profile_pics/" . $q->username . ".jpg") ?
    "profile_pics/" . $q->username . ".jpg" : "profile_pics/default.jpg";
echo "
<div class=\"pure-g\">
    <div class=\"pure-u-md-3-8\"></div>
    <div class=\"pure-u-1 pure-u-md-1-4 card\">
    <a class=\"pure-button back-button\" href=\".\">Back</a>
<br/>
<img class='profile_img' src='".$img_path."'>
<h2>{$q->name}'s Question</h2>
<ul>
    <p>Asked at ".date("H:i", $q->created_time)." on ".date('Y-m-d',$q->created_time)."</p>
    <li>
        <h3>Class</h3>
        <p>{$q->clss}</p>
    </li>
    <li>
        <h3>Assignment</h3>
        <p>{$q->assn}</p>
    </li>
    <li>
        <h3>Question</h3>
        <p class='question-text'>{$q->qtext}</p>
    </li>
</ul>
";
if(Question::isActive($q->id)){
    echo "
<a class='pure-button delete-question' href='delete-question.php?id={$q->id}'>Delete</a>";
} else{
    echo "<p><b>This question has been deleted.</b></p>";
}
echo '    </div>
</div></div>';
include 'footer.php';
echo '
</body>';