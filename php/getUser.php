<?php
    session_start();
    include_once "connect.php";

    // if (($_SESSION['last_active_time'] - time()) >) {
    //     # code...
    // }
    // echo "session id = ". $_SESSION['unique_id'];

    // echo "email = ".$_COOKIE['email']. "\n";

    if(isset($_SESSION['unique_id'])) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' ORDER BY active_status ");
        // $sql = mysqli_query($conn, "SELECT * FROM users ");
        if (mysqli_num_rows($sql) > 0) {
            $userList = "";

            while ($data = mysqli_fetch_assoc($sql)) {
                // echo $_SESSION['unique_id'];
                // echo $data['unique_id'] . " ";
                
                // SELECT * FROM messages WHERE (incomming_id = '{$_SESSION['unique_id']}' AND outgoing_id = '{$data['unique_id']}') OR (incomming_id = '{$data['unique_id']}' AND outgoing_id = '{$_SESSION['unique_id']') ORDER BY msg_id LIMIT 1
                    // while ($msgData = mysqli_fetch_assoc(mysqli_query($conn, "select * from messages where (outgoing_id = '{$_SESSION['unique_id']}' and incomming_id = '{$data['unique_id']}') or (outgoing_id = '{$data['unique_id']}' and incomming_id = '{$_SESSION['unique_id']}') "));) {
                        
                    //     echo $msgData['msg']." ";
                    // }
                
                $msg = "last message";
                    

                $userList .='<a href="message.php?unique_id='. $data['unique_id'] .'">
                                <div class="loggedUser userList">
                                    <div>
                                        <img src="php/uploads/'. $data['image_id'] .'">
                                        <div class="details">
                                            <span>'. $data['fname'] ." ". $data['lname'] .'</span>
                                            <p class="lastMsg">last message</p>
                                        </div>
                                    </div>
                                    <div class="activeLog ' . $data['active_status'] . '"></div>
                                </div>
                            </a>';
            }
            echo $userList;
            
        }else {
            echo "No one is available";
        }
    }else {
        echo "error something went wrong";
    }
?>