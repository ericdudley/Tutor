<?php
spl_autoload_register(function ($class) {
    @require_once($class . '.php');
});
if($_SERVER['uid'] == null){
    $_SERVER['uid'] = "tst1234";
    $_SERVER['givenName'] = "Bobby";
    $_SERVER['sn'] = "Haskell";
    $_SERVER['ritEduAffiliation'] = "UGAFF;UGAFFSTD;StudentWorker;STDAFFIL;Student;ResidentMain";
}
?>
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
    <link rel="stylesheet"
          href="assets/css/footer-distributed.css">
    <link rel="stylesheet"
          href="assets/css/bootstrap.min.css">
    <script>
        var username = "<?php echo $_SERVER['uid'];?>";
    </script>
</head>
<body>
<div id="logo-wrapper" class="pure-g">
    <div class="pure-u-1-2 pure-u-md-1-4">
        <a href="index.php">
            <img src="assets/img/cs_logo.png" id="logo">
        </a>
    </div>
    <h1 class="pure-u-1-2 pure-u-md-1-2">Tutor</h1>
    <?php
    if(Tutor::verify($_SERVER['uid'])) {
    echo '<div class="pure-u-1 pure-u-md-1-4 head-button">';
        if (Tutor::isActive($_SERVER['uid'])) {
        echo "<a class='pure-button' href='clock-out.php?username={$_SERVER['uid']}'>Clock out</a>";
        }
        else{
        echo "<a class='pure-button' href='clock-in.php?username={$_SERVER['uid']}'>Clock in</a>";
        }
        if(Tutor::verify($_SERVER['uid'])) {
            echo '<a class="pure-button" href="tutor-admin.php">Manage Tutors</a>';
        }
        echo '</div>';
    }
    ?>
</div>