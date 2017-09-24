<?php
include "head.php";
include "tutors-only.php";
if($_GET['username'] == null){
    echo 'No username.';
    exit();
}
$t = Tutor::get($_GET['username']);
if($t == null){
    echo 'No user with that username.';
    exit();
}
?>
<div class="content">
<div class="pure-g">
    <div class="pure-u-1 spacer"></div>
    <div class="pure-u-md-1-4"></div>
    <div class="pure-u-1 pure-u-md-1-2 card">
        <a class="pure-button" href="tutor-admin.php">Back</a>
        <form id="create-tutor-form" class="pure-form-stacked" action="update-tutor.php" method="post">
            <input type="text" placeholder="abc1234, xyz6789..." name="username" value="<?php echo $t->username;?>" readonly required>
            <input type="text" placeholder="Bob Haskell, Jon Pope..." name="name" value="<?php echo $t->name;?>"  required>
            <input class='pure-button' type="submit" value="Update Tutor">
            <a class='pure-button delete-question' href='delete-tutor.php?username=<?php echo $t->username;?>'>Delete</a>
        </form>
    </div>
</div>
</div>
<?php include 'footer.php'?>