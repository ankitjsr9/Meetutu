<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="hero-sign-up">
            <a href="index.php"><img src="img/back.png" style="height: 30px;width: 30px;position: absolute;margin-left: 40px;margin-top: 30px;"></a>
            <a href="sign_up.php"><img src="img/sign_up_logo.png" height="85px" width="170px" style="display: block;margin: 15px auto;"></a>
            <div class="form-box-sign-up">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="s1()">Teacher</button>
                    <button type="button" class="toggle-btn" onclick="s2()">Learner</button>
                </div>
                <div class="social-icons">
                    <a href="#google"><img src="img/glg.png"></a>
                </div>
                <form id="teacher" class="input-group" onSubmit = "return checkPassword(this)" action="php/insert_teacher.php" method="POST">
                    <input type="text" name="first_name" placeholder="First name" class="input-field" required>
                    <input type="text" name="last_name" placeholder="Last name" class="input-field" required>
                    <input type="tel" name="mobile_no" placeholder="Enter your Mobile number" maxlength="10" minlength="10" class="input-field" pattern="[6-9]{1}[0-9]{9}" required>
                    <div class="autocomplete" required>    
                        <input id="myInput" type="text" name="specialization" placeholder="Area of specialization" class="input-field" required>
                    </div>
                    <input type="email" class="input-field" name="email_id" placeholder="Enter your Email ID" required>
                    <input type="Password" name="password1" required placeholder="Enter Password" class="input-field" minlength="8">
                    <input type="Password" name="password2" required placeholder="Confirm Password" class="input-field" minlength="8">
                    <input type="checkbox" name="check-box" required><span style="margin-left: 10px;">I agree to the terms and conditions</span>
                    <div id="spa_sign_up">Already signed up?<a href="log_in.php">LogIn</a></div>
                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
                <form id="learner" class="input-group" onSubmit = "return checkPassword(this)" action="php/insert_learner.php" method="POST">
                    <input type="text" name="first_name" placeholder="First name" class="input-field" required>
                    <input type="text" name="last_name" placeholder="Last name" class="input-field" required>
                    <input type="tel" name="mobile_no" placeholder="Enter your Mobile number" pattern="[6-9]{1}[0-9]{9}" maxlength="10" class="input-field" required>
                    <div class="autocomplete">
                        <input id="myInputq" type="text" name="learn" placeholder="I want to learn" class="input-field" required>
                    </div>
                    <input type="email" class="input-field" name="email_id" placeholder="Enter your email ID" required>
                    <input type="Password" name="password1" required placeholder="Enter Password" class="input-field" minlength="8">
                    <input type="Password" name="password2" required placeholder="Confirm Password" class="input-field" minlength="8">
                    <input type="checkbox" name="check-box" required><span style="margin-left: 10px;">I agree to the terms and conditions</span>
                    <div id="spa_sign_up">Already signed up?<a href="log_in.php">LogIn</a></div>
                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
            </div>
            <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
        </div>
        <script src="js/java_script.js"></script>
        <script src="js/code_jquery.js"></script>
    </body>
</html>