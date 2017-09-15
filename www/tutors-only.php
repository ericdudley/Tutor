<?php
require_once "Tutor.php";
if(!Tutor::verify($_SERVER['uid'])){
    echo '
<div class="content">
<div class="pure-g">
    <div class="pure-u-md-1-4"></div>
    <div class="pure-u-1 pure-u-md-1-2 card">
        <a class="pure-button" onclick="window.history.back()">Back</a>
        <h3>You are not a tutor!</h3>
    </div>
</div>
</div>';
    include "footer.php";
    exit();
}
?>