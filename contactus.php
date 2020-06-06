<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/ajax_googleapies.js"></script>
        <script src="js/maxcdn_bootstrapcdn.js"></script>
        <script src="js/code_jquery.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .contactus_area{
                width: 100%;
                height: 450px;
                text-align: center;
            }
            .contactus_form{
                position: relative;
                text-align: center;
                margin: 10px auto;
                width: 500px;
                height:350px;
                background-color:#333;
            }
            .con_inp{
                font-family: cursive;
                font-size: 16px;
                width: 250px;
                padding: 10px 0;
                margin: 5px 9px;
                border-left: 0;
                border-right: 0;
                border-top: 0;
                border-bottom: 1px solid black;
                outline: none;
                background: transparent;
            }
            .con_btn{
                width: 100px;
                position: relative;
                color: darkviolet;
                background-color: lightblue;
                border-radius: 10px;
                height: 30px;
            }
            .con_sub{
                position: relative;
                text-align: center;
                font-size: 60px;
            }
            .social{
                width: 60px;
                height: 60px;
                margin-right:25px;
                margin-left:25px;
            }
            .con_social{
                margin-top: 20px;
                position: relative;
            }
        </style>
    </head>
    <body class="back">
        <?php   $hed = $_SERVER["DOCUMENT_ROOT"]."/"; include($hed."header.html");?>
        <div class="con_sub">Contact Us</div>
        <div class="contactus_area">
            <form class="contactus_form" style="font-size:16px;" action="php/req_contactus.php" method="post">
                Name : <input type="text" name="con_name" required class="con_inp"> 
                <br>
                Subject : <input type="text" name="con_sub" required class="con_inp"><br>
                Email Id : <input type="email" name="con_email" required class="con_inp"><br>
                Description : <textarea rows="4" cols="50" name="con_des" placeholder="Enter text here..." style="color:black;font-family: cursive;"></textarea><br><br>
                <button type="submit" class="con_btn">Submit</button>
            </form>
            <div class="con_social">
                <a href="https://www.facebook.com/ankitjsr9" target="_blank"><img src="img/fb.png" class="social"></a>
                <a href="https://www.instagram.com/_ankit__9/" target="_blank"><img src="img/insta.png" class="social"></a>
                <a href="https://twitter.com/_ankit_9" target="_blank"><img src="img/twitter.png" class="social"></a>
                <a href="https://in.linkedin.com/in/ankit-kumar-a332a3194" target="_blank"><img src="img/linkedin.png" class="social"></a>
            </div>
        </div>
        <script src="js/java_script.js"></script>
        <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
    </body>
</html>