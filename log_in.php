<?php
error_reporting(0);
session_start();
if($_SESSION['whoo']=='teacher')
{
    header('Location: php/welcome_teacher.php');
}
else if($_SESSION['whoo']=='learner')
{
    header('Location: php/welcome_learner.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/java_script.js"></script>
    </head>
    <body>
        <div class="hero-sign-in">
            <a href="index.php"><img src="img/back.png" style="height: 40px;width: 40px;position: absolute;margin-left: 40px;margin-top: 30px;"></a>
            <a href="log_in.php"><img src="img/sign_in_logo.png" height="101px" width="170px" style="display: block;margin: 0 auto;"></a>
            <div class="form-box-sign-in">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="s1()">Teacher</button>
                    <button type="button" class="toggle-btn" onclick="s2()">Learner</button>
                </div>
                <div class="social-icons">
                    <a href="#google"><img src="img/glg.png"></a>
                </div>
                <form id="teacher" action="php/signin_teacher.php" method="post" class="input-group">
                    <input type="email" class="input-field" name="email_id" placeholder="Enter your email ID" required>
                    <input type="Password" name="password" required placeholder="Enter Password" class="input-field" minlength="8">
                    <input type="checkbox" name="check-box"><span style="margin-right:15px;">Remember me</span>
                    <div id="spa_sign_in">Don't have an account?<a href="sign_up.php">Sign up</a></div>
                    <button type="submit" class="submit-btn">LogIn</button>
                </form>
                <form id="learner" action="php/signin_learner.php" method="post" class="input-group">
                    <input type="email" class="input-field" name="email_id" placeholder="Enter your email ID" required>
                    <input type="Password" name="password" required placeholder="Enter Password" class="input-field" minlength="8">
                    <input type="checkbox" name="check-box"><span style="margin-right:15px;">Remember me</span>
                    <div id="spa_sign_in">Don't have an account?<a href="sign_up.php">Sign up</a></div>
                    <button type="submit" class="submit-btn">LogIn</button>
                </form>
            </div>
            <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
        </div>
        <script src="js/java_script.js"></script>
    </body>
</html>