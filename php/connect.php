<?php
    $conn = mysqli_connect("localhost", "root", "", "chatwithmukesh");
    if (!$conn) {
        die("can not connect to database --> " . mysqli_connect_error());
        exit;
    }
?>