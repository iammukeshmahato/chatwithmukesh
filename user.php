<?php
    session_start(); 
    include "php/connect.php";
    include_once "header.php";
    // require("php/checkActive.php");
    if (!isset($_SESSION['unique_id'])) {
        header("location: index.php");
    }
?>
<link rel="stylesheet" href="css/userStyle.css">
<body>
    <div class="container">

        <div class="loggedUser">
            <div>
                <img src="php/uploads/<?php if (isset($_SESSION['unique_id'])) {
                                if ($data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' "))) {
                                    echo $data['image_id'];
                                }
                            }?>">
                <div class="details">
                    <span id="loggedUserName">
                        <?php
                            if (isset($_SESSION['unique_id'])) {
                                $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' "));
                                if ($data) {
                                    echo $data['fname'] . " " . $data['lname'];
                                }
                            }
                        ?>
                    </span>
                    <p>
                        <?php
                        if(isset($_SESSION['unique_id'])){
                            if ($data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' "))) {
                                echo $data['active_status'];
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
                <a href="php/logout.php" id="logout" onclick="return confirm('Are you sure want to logout ?')">Log Out</a>
        </div>

        <div class="search">
            <!-- <b id="searchText">Search</b> -->
            <input type="text" name="searchBox" id="searchBox" placeholder="Type to search...">
            <!-- <img src="search.png" alt="search_icon" /> -->
        </div>

        <div class="userListArea">
            <!-- <a href="#">
                <div class="loggedUser userList">
                    <div>
                        <img src="images/mkm.jpg">
                        <div class="details">
                            <span>Abishek Mahato</span>
                            <p class="lastMsg">last message</p>
                        </div>
                    </div>
                    <div class="activeLog Active Now"></div>
                </div>
            </a> -->
        </div>

    </div>

    <script src="js/search.js"></script>
    <script src="js/userList.js"></script>
</body>
</html>
