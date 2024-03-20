<?php
    session_start();
    include_once "connect.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // echo $email;
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    

    if (isset($_POST['rememberMe'])) {
        setcookie("email", $email, time() + 3600, "/chatWithMukesh");
        setcookie("password", $pass, time() + 3600, "/chatWithMukesh");
    }else {
        setcookie("email", $email, time()-3600, "/chatWithMukesh");
        setcookie("password", $pass, time()-3600, "/chatWithMukesh");
    }

    if (!empty($email) && (!empty($pass))) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
    
            if (mysqli_num_rows($sql) > 0) {
                
                //  echo $rememberMe;   
                // $encPass = md5($pass);
                $encPass = $pass;
                $data = mysqli_fetch_assoc($sql);
                // echo $data['password'];
    
                if($data['password'] === $encPass) {
                    $_SESSION['unique_id'] = $data['unique_id'];
                    // mysqli_query($conn, "UPDATE users SET active_status = 'Active Now' WHERE unique_id = '{$data['unique_id']}' ");
                    $updateActiveStatus = mysqli_query($conn, "UPDATE users SET active_status = 'Active Now' WHERE unique_id = '{$data['unique_id']}' ");
                    if($updateActiveStatus) {
                        $_SESSION['last_active_time'] = time();
                        echo "loginSuccessful";
                    }
                    // echo $_SESSION['unique_id'];
                }else {
                    echo "Incorrect Email or Password";
                }
            }else {
                echo "Incorrect Email or Password";
            }
        }else {
            echo "Invalid email address";
        }
    }else {
        echo "Please enter your email and password!!!";
    }
?>