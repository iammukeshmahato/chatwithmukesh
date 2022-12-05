<?php
session_start();
include_once "connect.php";

// if (($_SESSION['last_active_time'] - time()) >) {
//     # code...
// }
// echo "session id = ". $_SESSION['unique_id'];

// echo "email = ".$_COOKIE['email']. "\n";

if (isset($_SESSION['unique_id'])) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' ORDER BY active_status ");
    // $sql = mysqli_query($conn, "SELECT * FROM users ");
    if (mysqli_num_rows($sql) > 0) {
        $userList = "";

        while ($data = mysqli_fetch_assoc($sql)) {
            // echo $_SESSION['unique_id'];
            // echo $data['unique_id'] . " ";

            // print_r($data);

            $msgRes = mysqli_query($conn, "SELECT * FROM `messages` WHERE incomming_id = '{$data['unique_id']}' AND outgoing_id = '{$_SESSION['unique_id']}' OR incomming_id = '{$_SESSION['unique_id']}' AND outgoing_id = '{$data['unique_id']}' ORDER by msg_id DESC LIMIT 1");
            $lastMsg = mysqli_num_rows($msgRes) > 0 ? mysqli_fetch_assoc($msgRes)['msg'] : "No message";

            $userList .= '<a href="message.php?unique_id=' . $data['unique_id'] . '">
                                <div class="loggedUser userList">
                                    <div>
                                        <img src="php/uploads/' . $data['image_id'] . '">
                                        <div class="details">
                                            <span>' . $data['fname'] . " " . $data['lname'] . '</span>
                                            <p class="lastMsg">' . $lastMsg . '</p>
                                        </div>
                                    </div>
                                    <div class="activeLog ' . $data['active_status'] . '"></div>
                                </div>
                            </a>';
            // break;
        }
        echo $userList;
    } else {
        echo "No one is available";
    }
} else {
    echo "error something went wrong";
}
