<?php
$error = true;
$name = time().".png";
$check_save = file_put_contents("screenshots/$name", base64_decode($_POST["viewImgSrc"]));

if ($check_save) {
    $error = false;
    echo $error;
}
else
    echo $error;