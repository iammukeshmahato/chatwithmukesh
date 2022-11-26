<?php
    session_start();
    include_once "connect.php";
    if (isset($_SESSION['unique_id'])) {
        $sending_id = $_SESSION['unique_id'];
        $receiving_id = $_POST['received_id'];
        $msg = mysqli_real_escape_string($conn, $_POST['inputMsg']);
        if (!empty($msg)) {
            $insertMessage = mysqli_query($conn, "INSERT INTO messages(incomming_id, outgoing_id, msg) values ({$receiving_id}, {$sending_id}, '{$msg}') ");
            if ($insertMessage) {
                echo "successfull";
            }
        }
    }
?>