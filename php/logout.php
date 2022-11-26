<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        include_once "connect.php";
        $logoutID = $_SESSION['unique_id'];
        $sql = mysqli_query($conn, "UPDATE users SET active_status = 'Offline Now' WHERE unique_id = '{$_SESSION['unique_id']}' ");
        if ($sql){
            session_unset();
            session_destroy();
            header("location: ../index.php");
        }
    }else {
        header("location: ../index.php");
    }
?>