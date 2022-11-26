<?php
    // include_once "connect.php";
    if (($_FILES['pp']['name'] !== "")) {
    $img_name = $_FILES['pp']['name'];
        $img_type = $_FILES['pp']['type'];
        $img_tempName = $_FILES['pp']['tmp_name'];
        $des = "uploads/" . $img_name;
        if(move_uploaded_file($img_tempName, $des)) {
            echo '<img src="php/uploads/' . $img_name . '">';
        }
    }
?>