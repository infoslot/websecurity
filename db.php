<?php
$con = mysqli_connect('localhost','php', 'phpapi','allphptricks');
    if (mysqli_connect_errno()) {
        echo "failed to connect to mysql:" . mysqli_connect_errno();
        die();
    }
?>
