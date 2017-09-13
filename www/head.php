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
<div id="logo-wrapper" class="pure-g">
    <div class="pure-u-1-2 pure-u-md-1-5">
        <img src="assets/img/cs_logo.png" id="logo">
    </div>
    <h1 class="pure-u-1-2 pure-u-md-4-5">Tutoring Center</h1>
</div>
<?php
spl_autoload_register(function ($class) {
    @require_once($class . '.php');
});
?>