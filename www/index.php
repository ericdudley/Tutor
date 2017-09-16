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
            echo '<div class="pure-u-1 pure-u-md-14-24 card">
<h2 id="profile-pic-msg">'.$_SERVER["givenName"].', upload a profile pic!</h2>
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
            <h3>Active Tutors <button onclick="refresh_tutors()"><i id="t-refresh" class="fa fa-refresh"></i></button></h3>
            </h3>
            <div id="tutor-list-container">
                <?php include "tutor-list.php"; ?>
            </div>
        </div>
        <div class="pure-u-md-1-24"></div>
        <div id="help-queue" class="pure-u-1 pure-u-md-7-24 card">
            <a class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
            <h3>Help Queue <button onclick="refresh_questions()"><i id="q-refresh" class="fa fa-refresh"></i></button></h3>
            <div id="question-list-container">
                <?php include "question-list.php"; ?>
            </div>
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
            setInterval(refresh_questions, 5000);
            setInterval(refresh_tutors, 120000);
        });

        function refresh_questions() {
            $("#q-refresh").addClass("fa-spin");
            $.ajax({
                url: 'question-list.php',
                success: function (msg) {
                    $('#question-list-container').html(msg);
                }
            });
            $("#q-refresh").removeClass("fa-spin");
        }

        function refresh_tutors(){
            $("#t-refresh").addClass("fa-spin");
            $.ajax({
                url: 'tutor-list.php',
                success: function (msg) {
                    $('#tutor-list-container').html(msg);
                }
            });
            $("#t-refresh").removeClass("fa-spin");

        }
    </script>
</div>
<?php include 'footer.php' ?>
</body>
</html>