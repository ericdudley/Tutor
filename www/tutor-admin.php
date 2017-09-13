<?php include "head.php" ?>
<div class="pure-g">
    <div class="pure-u-1 back-button">
        <a class="pure-button" href="index.php">Back</a>
    </div>

    <div class="pure-u-sm-1-5"></div>
    <div class="pure-u-1 pure-u-sm-3-5">
        <form id="create-tutor-form" class="pure-form-stacked" action="create-tutor.php" method="post">
            <input type="text" placeholder="abc1234, xyz6789..." name="username" required>
            <input type="text" placeholder="Bob Haskell, Jon Pope..." name="name" required>
            <input type="submit" value="Add Tutor">
        </form>
    </div>
    <div class="pure-u-sm-1-5"></div>
    <div class="pure-u-sm-1-5"></div>
    <div class="pure-u-1 prue-u-sm-3-5">
        <ul class="pure-menu-list">
            <?php
            foreach (Tutor::getAll() as $idx => $t) {
                echo "<li class='pure-menu-item'>
<a class='pure-menu-link' href='#'>{$t->username} | {$t->name}</a>
<a class='pure-button delete-question' href='delete-tutor.php?username={$t->username}'>Delete</a></li>";
            }
            ?>
        </ul>
    </div>
</div>