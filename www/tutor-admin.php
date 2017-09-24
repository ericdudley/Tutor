<?php
include "head.php";
include "tutors-only.php";
?>
<div class="content">
<div class="pure-g">
    <div class="pure-u-1 spacer"></div>
    <div class="pure-u-md-4-24"></div>
    <div class="pure-u-1 pure-u-md-1-4 card">
        <a class="pure-button" href="index.php">Back</a>
        <form id="create-tutor-form" class="pure-form-stacked" action="create-tutor.php" method="post">
            <input type="text" placeholder="abc1234, xyz6789..." name="username" required>
            <input type="text" placeholder="Bob Haskell, Jon Pope..." name="name" required>
            <input class="pure-button" type="submit" value="Add Tutor">
        </form>
    </div>
    <div class="pure-u-1 pure-u-md-9-24 card">
        <ul id="tutor-list">
            <?php
            foreach (Tutor::getAll() as $idx => $t) {
                echo "<a href='tutor-update-page.php?username=".$t->username."'><li>
<span>{$t->username} | {$t->name}</span></li></a>";
            }
            ?>
        </ul>
    </div>
</div>
</div>
<?php include 'footer.php'?>