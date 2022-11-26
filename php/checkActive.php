<?php
session_start();
// echo "mkm";

if (isset($_GET['checkActive']) && $_GET['checkActive'] == 1) {
    // echo "checkActive";
    echo "time = ". time(). "\n";
    // if ((time() - $_SESSION['lastActiveTime'] > 10)) {
    //     echo "loginExpire";
    // } else {
    //     echo "not expire";
    // }
} else {
    if (isset($_SESSION['lastActiveTime'])) {
        if ((time() - $_SESSION['lastActiveTime'] > 10)) {
            header('location: logout.php');
            die();
        }
    }
    $_SESSION['lastActiveTime'] = time();
    echo "last active session = ".$_SESION['lastActiveTime']."\n";
    if (!isset($_SESSION['unique_id'])) {
        header("location: ./index.php");
    }
}
