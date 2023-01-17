<?php
    session_start(); 

    include_once "php/connect.php";
    include "header.php";
    if (!isset($_GET['unique_id'])) {  
        header("location: user.php");
    }else {
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_GET['unique_id']}' "));
    }
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="css/Messages.css">
</head>
<body>
    <div class="parent">
        <div class="container">
            <div class="header">
                <div class="person">
                        <div class="opened-user">
                            <a href="user.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <img src="php/uploads/<?php echo $data['image_id']?>" <?php if ($data['active_status'] == "Active Now") {
                                echo "class = active";}?>>
                        </div>
                        <div class="details">
                            <span id="name"><?php echo $data['fname']?></span><br>
                            <span id="status"><?php echo $data['active_status'] ?></span>
                        </div> 
                </div>   
                <div class="icons">
                    <i class="fa-solid fa-phone"></i>
                    <i class="fa-solid fa-video"></i>
                    <i class="fa-solid fa-list"></i>
                </div>
            </div>

            <div class="msgArea">
                <!-- <div class="msgBox outgoingMsg">
                   Lorem, ipsum doloit. Voluptate fu  
                </div>
                <div class="msgBox incommingMsg">
                   Lorem, ipsum doloit. Voluptate fu
                </div>
             -->
            </div>

            <form class="form"action="#" method="post" autocomplete="off">
                <div class="row">
                    <div class="icons">
                       <i class="fa-solid fa-grid-2"></i>
                       <i class="fa-solid fa-camera"></i>
                       <i class="fa-solid fa-image"></i>
                       <i class="fa-solid fa-microphone"></i>
                   </div>
                   <input type="text" name="received_id" value="<?php echo $_GET['unique_id'];?>" hidden>
                   <input type="text" name="inputMsg" class="inputMsg" placeholder="Type a message..." autofocus>
                    <!-- <input type="text" placeholder="Message"> -->
                    <!-- <i class="fa-solid fa-face-smile"></i> -->
                      <!-- <i class="fa-solid fa-heart"></i> -->
                    <button type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/message.js"></script>
</body>
</html>