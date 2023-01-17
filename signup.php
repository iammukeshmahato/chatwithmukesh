<?php
    include_once "header.php";
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
   
<body>
    <div class="parent">
        <div class="container">
            <div class="child1">
                <div id="logoApp"class="showPP">
                    <img src="php\uploads\download-removebg-preview (1).png"><span>Chat With Me</span>
                </div>

                <div class="errorText">
                    something went wrong
                </div>

                <h1>Create New Account</h1>
                <form action="#" method="post"id="form" enctype="multipart/form-data">
                    <div class="input">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="fname" id="fname" placeholder="First Name" autofocus required>
                    </div>
                    <div class="input">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" autofocus required>
                    </div>
                    <div class="input">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="email" id="email" placeholder="Email Address" autofocus required>
                    </div>
            
                    <div class="input">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="pass" id="pass" class="inputPassword" placeholder="Password" autocomplete="off"
                            required>
                        <i class="fa fa-eye-slash" id="eye" aria-hidden="true" class="showHideToggle"></i>
                    </div>

                    
                           <div class="input-file">
                           <label for="file" id="label">Profile Picture</label>
                           <input type="file" name="pp" id="pp" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                            
                           </div>
                    <button class="btn" id="btn" type="submit">Sign Up</button>
                </form>
            </div>
            <div class="child2">
                <div class="signup">
                    <p>Already Have Account?</p><br />
                    <p> Login Here
                    </p>
                    <button class="btn whitebtn"><a href="index.php">Sign in</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/ShowHide.js"></script>
    <script src="js/signUpM.js"></script>
</body>

</html>