<?php include "head.php"; ?>
<body>
<div class="content">
<div class="pure-g">
    <?php
    $db = SQLiteConnection::connect();
    if ($db != null) {
        foreach (Config::CREATE_TABLE_STRINGS as $str) {
            $db->exec($str);
        }
    }

    echo '<div class="pure-u-md-5-24"></div>';
    if (!file_exists('profile_pics/' . $_SERVER['uid'] . '.jpg')) {
        echo '<div class="pure-u-1 pure-u-md-1-2 card">
<h2>You don\'t have a profile pic, upload one!</h2>
<form id="pic-form" class="pure-form" action="upload-profile-pic.php" method="post" enctype="multipart/form-data">
    <p>Choose Profile Pic</p>
    <input id="pic-select-input" type="file" name="img">
</form>
</div>';
    } else {
        echo '<div class="pure-u-1 pure-u-md-14-24 card">
<h2>Hello, ' . $_SERVER["givenName"] . '.</h2>
<img class="profile_img" src="profile_pics/' . $_SERVER["uid"] . '.jpg">
<form id="pic-form" class="pure-form" action="upload-profile-pic.php" method="post" enctype="multipart/form-data">
    <p>Change Profile Pic</p>
    <input id="pic-select-input" type="file" name="img">
</form>

</div>';
    }
    echo '
<div class="pure-u-md-5-24"></div>
<div class="pure-u-md-5-24"></div>';
    ?>
    <div class="pure-u-1 pure-u-md-6-24 card">
        <h3>Active Tutors</h3>
        <?php include "tutor-list.php"; ?>
    </div>
    <div class="pure-u-md-1-24"></div>
    <div id="help-queue" class="pure-u-1 pure-u-md-7-24 card">
        <a class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
        <h3>Help Queue <a href="." id="refresh-icon"><i class="fa fa-refresh"></i></a></h3>
        <?php include "question-list.php"; ?>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="assets/js/scroll-sneak.js"></script>
<script>
    $(document).ready(function () {
        document.getElementById("pic-select-input").onchange = function () {
            document.getElementById("pic-form").submit();
        };
        var sneaky = new ScrollSneak(location.hostname)
        var refresh = document.getElementById('refresh-icon');
        refresh.onclick = sneaky.sneak;

        $(".delete-question").each(function () {
            $(this)[0].onclick = sneaky.sneak;
        });
    });
</script>
</div>
<?php include 'footer.php'?>
</body>
</html>