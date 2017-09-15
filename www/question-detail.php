<?php
include "head.php";

echo '
<div class="pure-g">
    <div class="pure-u-md-3-8"></div>
    <div class="pure-u-1 pure-u-md-1-4 card">
    <a class="pure-button back-button" href=".">Back</a>
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
echo "
<br/>
<img class='profile_img' src='profile_pics/" . $q->username . ".jpg'>
<h2>{$q->name}'s Question</h2>
<ul>
    <li>
        <h3>Class</h3>
        <p>{$q->clss}</p>
    </li>
    <li>
        <h3>Assignment</h3>
        <p>{$q->assn}</p>
    </li>
        </li>
        <li>
        <h3>Question</h3>
        <p>{$q->qtext}</p>
    </li>
</ul>";

echo '    </div>
</div>
</body>';