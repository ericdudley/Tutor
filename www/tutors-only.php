<?php
require_once "Tutor.php";
if(!Tutor::verify($_SERVER['uid'])){
    echo '
<div class="pure-g">
    <div class="pure-u-1">
        <p>You are not a tutor!</p>
    </div>
</div>';
    exit();
}
?>