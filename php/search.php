<?php
session_start();
    include "connect.php";
if (isset($_SESSION['unique_id'])) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' ORDER BY active_status ");
        // $sql = mysqli_query($conn, "SELECT * FROM users ");
   if (mysqli_num_rows($sql) > 0) {
            $userList = "";
    
      while ($data = mysqli_fetch_assoc($sql)) {

        $searchText = $_GET['searchText'];
         // echo $_REQUEST['searchText'];

         // echo $_SESSION['unique_id'];

    
 
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' AND fname LIKE '%{$searchText}%' OR lname LIKE '%{$searchText}%' ");
                $output = "";
                $msgRes = mysqli_query($conn, "SELECT * FROM `messages` WHERE incomming_id = '{$data['unique_id']}' AND outgoing_id = '{$_SESSION['unique_id']}' OR incomming_id = '{$_SESSION['unique_id']}' AND outgoing_id = '{$data['unique_id']}' ORDER by msg_id DESC LIMIT 1");
              $lastMsg = mysqli_num_rows($msgRes) > 0 ? mysqli_fetch_assoc($msgRes)['msg'] : "No message";

                  if (mysqli_num_rows($sql) > 0) {
                      while ($data = mysqli_fetch_assoc($sql)) {
                      $output .= '<a href="message.php?unique_id=' . $data['unique_id'] . '">
                             <div class="loggedUser userList">
                                 <div class="user-box" style="background-color: #ebffef8a;">
                                    <div class="user">
                                           <img src="php/uploads/' . $data['image_id'] . '">
                                           <div class="details">
                                              <span>' . $data['fname'] . " " . $data['lname'] . '</span>
                                            <p class="lastMsg">' . $lastMsg . '</p>
                                           </div>
                                    </div>
                                    <div class="activeLog ' . $data['active_status'] . '"></div>
                                 </div>
                             </div>
                          </a>';
                         }
                       echo $output;
                  }else {
                     echo "No users found to you search";
                        }
        }
     }
}
?>