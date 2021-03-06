<?php
include "head.php";
$target_dir = "profile_pics/";
$target_file = $target_dir . $_SERVER['uid'].'.jpg';
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file size
if ($_FILES["img"]["size"] > 8000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {
    echo "Sorry, only JPGs are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        chmod($target_file, 0644);
        include "redirect.php";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
