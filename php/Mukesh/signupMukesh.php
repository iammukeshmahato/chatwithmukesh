<?php
    include_once "header.php";
?>
<link rel="stylesheet" href="css/signupStyle.css">
<body>
    <div class="container">
        <div class="form signup">
            <div class="errorText">
                something went wrong
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="input">
                    <input type="text" name="fname" id="fname" required>
                    <label for="fname">First Name:</label>
                </div>
                <div class="input">
                    <input type="text" name="lname" id="lname" required>
                    <label for="lname">Last Name:</label>
                </div>
                <div class="input">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email:</label>
                </div>
                <div class="input">
                    <input type="text" name="pass" id="pass"  required> 
                    <label for="pass">Password</label>
                    <!-- <i class="showHideToggle"></i> -->
                </div>
                <div class="showPP input">
                    <!-- <img> -->
                </div>
                <div class="input">
                    <input type="file" name="pp" id="pp" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                    <label for="file">Profile Picture</label>
                </div>

                <div class="submitBtn">
                    <button type="submit">Continue</button>
                </div>

                <div class="loginBtn">
                    Aready have account <a href="index.php">Login Here</a>
                </div>
            </form>
        </div>
    </div>

    <script src="js/signup.js"></script>
</body>