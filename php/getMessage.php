<?php
    session_start();
    include_once "connect.php";

    if (isset($_SESSION['unique_id'])) {
        $sending_id = $_SESSION['unique_id'];
        $receiving_id = $_POST['received_id'];

        $getMsg = mysqli_query($conn, "SELECT * FROM messages WHERE (incomming_id = '{$receiving_id}' AND outgoing_id = '{$sending_id}') OR (incomming_id = '{$sending_id}' AND outgoing_id = '{$receiving_id}') ORDER BY msg_id desc limit 15");
        // $img = mysqli_query($conn, "SELECT image_id FROM users inner join users on messages.msg_id=users.id WHERE (incomming_id = '{$receiving_id}' AND outgoing_id = '{$sending_id}') OR (incomming_id = '{$sending_id}' AND outgoing_id = '{$receiving_id}') ORDER BY msg_id desc limit 15");

        $output = "";
        if (mysqli_num_rows($getMsg) > 0) {
            while ($data = mysqli_fetch_assoc($getMsg)) {
                if ($sending_id === $data['outgoing_id']) {
                    $output = '<div class="msgBox outgoingMsg">' . $data['msg'] . 
                '</div>' . $output;
                }else {
                //     $output = '<div class="msgBox incomming-wrapper">
                //     <img src="php/uploads/'.$data['image_id'].'">
                //     <div class="msgBox incommingMsg">'.$data['msg'].'</div>
                // </div>';

                    $output = '<div class="msgBox incommingMsg">' . $data['msg'] .   
                '</div>' . $output;
                }
            }
            echo $output;
        }else {
            echo '<div class="noMessage">No nessage available</div>';
        }
    }

?>