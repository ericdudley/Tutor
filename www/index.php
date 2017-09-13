<?php include "head.php"; ?>
<body>

<div class="pure-g">
    <?php
    $db = SQLiteConnection::connect();
    if ($db != null) {
        foreach(Config::CREATE_TABLE_STRINGS as $str) {
           $db->exec($str);
        }
    }

    if(Tutor::verify($_SERVER['uid'])) {
        echo '<div class="pure-u-1">';
        if (Tutor::isActive($_SERVER['uid'])) {
            echo "<a class='pure-button' href='clock-out.php?username={$_SERVER['uid']}'>Clock out</a>";
        }
        else{
            echo "<a class='pure-button' href='clock-in.php?username={$_SERVER['uid']}'>Clock in</a>";
        }
        echo '</div>';
    }
    ?>
    <div class="pure-u-1">
        <h3>Active Tutors</h3>
        <?php include "tutor-list.php"; ?>
    </div>
    <div class="pure-u-1">
        <a class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
    </div>
    <div class="pure-u-1">
        <h3>Help Queue</h3>
        <?php include "question-list.php"; ?>
    </div>
    <div class="pure-u-1">
        <?php
            if(Tutor::verify($_SERVER['uid'])) {
                echo '<a class="pure-button" href="tutor-admin.php">Manage Tutors</a>';
            }
        ?>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</body>
</html>