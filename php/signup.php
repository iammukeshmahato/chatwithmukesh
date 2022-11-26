<?php
    session_start();
    include_once "connect.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);


    if (preg_match("/^[a-zA-Z]{2,}$/", $fname)) {
        if (preg_match("/^[a-zA-Z]{2,}$/", $lname)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailQuery = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
                if(!mysqli_num_rows($emailQuery) > 0)
                {
                    if (preg_match("/^[a-zA-Z0-9@#\$\-_]{6,}$/", $pass)) {
                        if ($_FILES['pp']['name'] !== "" && $_FILES['pp']['size'] != 0) {
                            $img_name = $_FILES['pp']['name'];
                            $img_type = $_FILES['pp']['type'];
                            $img_tempName = $_FILES['pp']['tmp_name'];
                            $des = "uploads/" . $img_name;
                            if(move_uploaded_file($img_tempName, $des)) {
                                $encryptedPassword = $pass;
                                $activeStatus = "Active Now";
                                $unique_id = rand(time(), 1000000000);

                                $insertData = mysqli_query($conn, "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `image_id`, `active_status`, `unique_id`) VALUES ('{$fname}', '{$lname}', '{$email}', '{$encryptedPassword}', '{$img_name}', '{$activeStatus}', '{$unique_id}') ");

                                if ($insertData) {
                                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
                                    if (mysqli_num_rows($sql) > 0) {
                                        $getUniqueId = mysqli_fetch_assoc($sql);
                                        $_SESSION['unique_id'] = $getUniqueId['unique_id'];
                                        echo "loginSuccessful";
                                    }
                                }else {
                                    echo "Something went wrong --> " . mysqli_error($conn);
                                }
                            }else {
                                echo "something went wrong with your file please select another file";
                            }
                        }else {
                            echo "please select picture";
                        }
                    }else {
                        echo "Invaild  password, password must be 8 character long and should contain number, upercase lowercase and special charecter like (@ # $ _)";
                    }
                }else {
                    echo "$email - This email address is already existed. \nTry login usnig this email";
                }
            }else {
                echo "Invaild  email address";
            }
        }else {
            echo "Invaild  Last Name";
        }
    }else {
        echo "Invaild  First Name";
    }

    // if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass)){
    //     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $emailQuery = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
    //         if(!mysqli_num_rows($emailQuery) > 0){


    //             if (($_FILES['pp']['name'] !== "")) {

    //                 $img_name = $_FILES['pp']['name'];
    //                 $img_type = $_FILES['pp']['type'];
    //                 $img_tempName = $_FILES['pp']['tmp_name'];
                
    //                 $des = "uploads/" . $img_name;
    //                 // echo $img_tempName;
    //                 if(move_uploaded_file($img_tempName, $des)) {
    //                     // echo "file uploaded";
    //                     // // $encryptedPassword = md5($pass);
    //                     $encryptedPassword = $pass;

    //                     $activeStatus = "Active Now";
    //                     $unique_id = rand(time(), 1000000000);


    //                     // $insertData = mysqli_query($conn, "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `image_id`, `active_status`, `unique_id`) VALUES ('{$fname}', '{$lname}', '{$email}', '{$encryptedPassword}', '{$img_name}', '{$activeStatus}', '{$unique_id}') ");

    //                     if ($insertData) {
    //                         // echo "Data Inserted into database successfully";
    //                         $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");

    //                         if (mysqli_num_rows($sql) > 0) {
    //                             $getUniqueId = mysqli_fetch_assoc($sql);
    //                             $_SESSION['unique_id'] = $getUniqueId['unique_id'];
    //                             echo "loginSuccessful";
    //                         }
    //                     }else {
    //                         echo "Something went wrong --> " . mysqli_error($conn);
    //                     }

    //                 }else {
    //                     echo "Sorry, there is some problem  with your file please select PNG, JPEG, or JPG format only";
    //                 }  
    //             }
    //             else {
    //                 // echo "Error no file selected";
    //                 echo "Please select any picture";
    //             }

    //         }else {
    //             echo "$email - This email address is already existed. \nTry login usnig this email";
    //         }
    //     }else {
    //         echo "Invalid Email Address";
    //     }
    // }else{
    //     echo "All input fields are required!";
    // }
?>