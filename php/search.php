<?php
session_start();
    include "connect.php";

    $searchText = $_GET['searchText'];
    // echo $_REQUEST['searchText'];

    // echo $_SESSION['unique_id'];

    

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' AND fname LIKE '%{$searchText}%' OR lname LIKE '%{$searchText}%' ");
    $output = "";
    if (mysqli_num_rows($sql) > 0) {
        while ($data = mysqli_fetch_assoc($sql)) {
           $output .= '<a href="#">
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
        echo $output;
    }else {
        echo "No users found to you search";
    }

?>