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
    ?>
    <div class="pure-u-md-5-24"></div>
    <div class="pure-u-1 pure-u-md-1-4 card">
        <h3>Active Tutors</h3>
        <?php include "tutor-list.php"; ?>
    </div>
    <div class="pure-u-md-1-24"></div>
    <div id="help-queue" class="pure-u-1 pure-u-md-1-4 card">
        <a class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
        <h3>Help Queue <a href="."><i class="fa fa-refresh"></i></a></h3>
        <?php include "question-list.php"; ?>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</body>
</html>