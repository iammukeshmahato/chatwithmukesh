<?php
    session_start(); 
    include "php/connect.php";
    include_once "header.php";
    // require("php/checkActive.php");
    if (!isset($_SESSION['unique_id'])) {
        header("location: index.php");
    }
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link rel="stylesheet" href="css/User.css">
    <link rel="stylesheet" href="css/Messages.css">
</head>
<body>
    <div class="parent">
        <div class="container">
            <div class="header">
                <div class="person">
                        <div class="opened-user">
                            <img src="php/uploads/<?php if (isset($_SESSION['unique_id'])) {
                                if ($data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' "))) {
                                    echo $data['image_id'];
                                }
                            }?>">
                        </div>
                        <div class="details">
                            <span id="name"> <?php
                            if (isset($_SESSION['unique_id'])) {
                                $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' "));
                                if ($data) {
                                    echo $data['fname'];
                                }
                            }
                        ?></span><br>
                            <span id="status"><?php echo $data['active_status'] ?></span>
                        </div> 
                </div>

                <div class="header-log"> 
                <a href="php/logout.php" id="logout" onclick="return confirm('Are you sure want to logout ?')">Log Out</a>
                <i class="fa-solid fa-list"></i>
                </div>  
            </div>   
            <!-- <div class="main"> -->
            <div class="search">
                <input type="text" name="searchBox" id="searchBox" placeholder="Search your friend name, or chat">
                <i class="fa-solid fa-magnifying-glass"></i>
           </div>
            
           <div class="users-scroll">
            <!-- <img src="">
            <img src=""> -->
           </div>

          <h1>Chats</h1>

           <div class="userListArea">
            <!-- <a href="#">
                <div class="loggedUser userList">
                    
                       <div class="user-box">
                     <div class="user">
                         <img src="">
                         <div class="details">
                            <span>Manish Joshi</span>
                            <p class="lastMsg">last message</p>
                         </div>
                       </div>
                      <div class="activeLog Active Now"></div>
                    </div>
                    <div class="user-box">
                     <div class="user">
                         <img src="">
                         <div class="details">
                            <span>Manish Joshi</span>
                            <p class="lastMsg">last message</p>
                         </div>
                       </div>
                      <div class="activeLog Active Now"></div>
                    </div> -->
                </div>
            </a>
           </div>
           <!-- </div> -->
           <footer>
               <div class="icons">
                    <div class="number">
                    <i class="fa-sharp fa-solid fa-comment"></i>
                    <span>3</span>
                    </div>
                    <div class="number">
                    <i class="fa-solid fa-video"></i>
                    <span>4</span>
                    </div>
                    <div class="number">
                    <i class="fa-solid fa-user-group"></i>
                    <span>3</span>
                    </div>
                    <div class="number">
                    <i class="fa-solid fa-bell"></i>
                    <span>8</span>
                    </div>
                </div>
           </footer>
       </div>
 </div>
    <script src="js/search.js"></script>
    <script src="js/userList.js"></script>
    <script src="js/userScroll.js"></script>
</body>
</html>