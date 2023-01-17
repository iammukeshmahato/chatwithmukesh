<?php

// include "php/login.php";
// if (isset($_COOKIE['email'])) {
//   echo "cookie is set";
// }else {
//   echo "cookie is not set";
// }

  include_once "header.php";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/Login.css">
</head>

<body>
    <div class="parent">
        <div class="container">
            <div class="child1">
                <div id="logoApp">
                    <img src="php\uploads\download-removebg-preview (1).png"><span>Chat With Me</span>
                </div>

                <div class="errorText">
                    something went wrong
                </div>

                <h1>Login To Your Account</h1>
                <form action="#" method="post" id="form">
                    <div class="input">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="email" id="email" placeholder="Email Address"
                            autofocus required <?php
                         if (isset($_COOKIE['email'])) {
                         echo "value=".$_COOKIE['email']; }
                          ?>>
                           <!-- style="background-color=:#c7ffe9;" -->
                    </div>
                    <br>
                    <div class="input">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="password" id="password"class="inputPassword" placeholder="Password" autocomplete="off"
                            required <?php
                         if (isset($_COOKIE['email'])) {
                          echo "value = " . $_COOKIE['password']; }
                        ?>>
                        <i class="fa fa-eye-slash" id="eye" aria-hidden="true" class="showHideToggle"></i>
                    </div>
                    <div class="rememberMe">
                        <input type="checkbox" name="rememberMe" id="rememberMe"
                            <?php  if (isset($_COOKIE['email'])) {echo "checked"; }?> />
                        <label for="rememberMe">Keep me signed in</label>
                    </div>
                    <button class="btn" id="btn">Sign In</button>
                    <div class="line"></div>
                    <a href="forget.php">Forget your password</a>
                </form>
            </div>
            <div class="child2">
                <div class="signup">
                    <p>New Here?</p><br />
                    <p> Sign up and discover a
                        <br>great amount of new opportunities
                    </p>
                    <button class="btn whitebtn"><a href="signup.php">Sign Up</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/ShowHide.js"></script>
    <script src="js/Login.js"></script>
</body>

</html>