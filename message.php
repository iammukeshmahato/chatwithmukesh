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
<link rel="stylesheet" href="css/messageStyle.css">
<body>
    <div class="container">
        <div class="header-div">
            <div class="wrapper">

                <a href="user.php" class="back-arrow">
                    <img src="images/back-arrow.png" class="back-arrow">
                </a>

                <a href="#" class="openedUser">
                    <img src="php/uploads/<?php echo $data['image_id']?>" <?php if ($data['active_status'] == "Active Now") {
                        echo "class = active";}?>>
                    <div class="details">
                        <span><?php echo $data['fname'] . " " . $data['lname']; ?></span>
                        <p><?php echo $data['active_status'] ?></p>
                    </div>
                </a>

            </div>

            <button>...</button>
        </div>

        <div class="msgArea">
            <!-- <div class="msgBox incomming-wrapper">
                <img src="php/uploads/bikash.jpeg">
                <div class="msgBox incommingMsg">mukesh</div>
            </div> -->
        </div>

        <form action="#" method="post" autocomplete="off">
            <div class="inputField">
                <input type="text" name="received_id" value="<?php echo $_GET['unique_id'];?>" hidden>
                <input type="text" name="inputMsg" class="inputMsg" placeholder="Type a message..." autofocus>
                <button type="submit">Send</button>
                <!-- <button>Login</button> -->
            </div>
        </form>
    </div>

    <script src="js/message.js"></script>
</body>