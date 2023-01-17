<?php

// include "php/login.php";
// if (isset($_COOKIE['email'])) {
//   echo "cookie is set";
// }else {
//   echo "cookie is not set";
// }

  include_once "header.php";
?>
<link rel="stylesheet" href="css/loginStyle.css" />

<body>
    <div class="container">
        <div class="form login">
            <div class="text">
                <h1>Hang out</h1>
                <h1>anytime, anywhere</h1>
                <p><strong>Chat With Mukesh</strong> is a web app developed to connects people with me</p>
            </div>

            <div class="errorText">
                something went wrong
            </div>

            <form action="#" method="post">
                <div class="input field">
                    <input type="email" name="email" id="email" placeholder="Email Address" autofocus required <?php
              if (isset($_COOKIE['email'])) {
                echo "value=".$_COOKIE['email']; }
            ?> />
                </div>

                <div class="input field">
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"
                        required <?php
              if (isset($_COOKIE['email'])) {
                echo "value = " . $_COOKIE['password']; }
            ?> />
                    <img src="images/hide.png" class="showHideToggle">
                </div>

                <div class="button field">
                    <button>Login</button>
                    <a href="forget.php" style="display: none;">Forget your password</a>
                </div>

                <div class="rememberMe">
                    <input type="checkbox" name="rememberMe" id="rememberMe" <?php 
          if (isset($_COOKIE['email'])) {
            echo "checked"; }

            
            ?> />
                    <label for="rememberMe">Keep me signed in</label>
                </div>

                <div class="signupBtb">
                    <a href="signup.php">Create new account</a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/showHideToggle.js"></script>
    <script src="js/login.js"></script>
</body>