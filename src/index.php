<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Tutor</title>
    <meta name="description" content="A question queue for rit cs tutoring center.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet"
          href="assets/css/main.css">
</head>
<body>

<div class="pure-g">
    <?php
    include "classes/SQLiteConnection.php";

    $db = SQLiteConnection::connect();
    if ($db != null) {
        foreach(Config::CREATE_TABLE_STRINGS as $str) {
           $db->exec($str);
        }
    }
    ?>
    <div class="pure-u-1 pure-u-lg-1-5">
        <a class="pure-button pure-button-primary" href="/pages/question-form.php">Ask for Help</a>
    </div>
    <div class="pure-u-1 pure-u-lg-4-5">
        <?php include "actions/question-list.php"; ?>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</body>
</html>