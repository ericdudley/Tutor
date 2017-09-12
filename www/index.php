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

    if($_SERVER['uid']){
        echo "<h1>Hello user ".$_SERVER['uid']."!</h1>";
        User::create($_SERVER['uid'],
            $_SERVER['givenName']." ".$_SERVER['sn'], "1");
    }
    ?>
    <div class="pure-u-1">
        <a class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
    </div>
    <div class="pure-u-1">
        <?php include "question-list.php"; ?>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</body>
</html>