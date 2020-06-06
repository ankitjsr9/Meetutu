<?php include("connection.php");
session_start();
if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}
$temp = $_SESSION['email_id'];
if($_SESSION['whoo'] === 'teacher'){
    $ql = "select first_name,last_name from teacher where email_id='$temp'";}
else{
    $ql = "select first_name,last_name from learner where email_id='$temp'";
}
$result = mysqli_query($conn, $ql);
$rows = mysqli_fetch_assoc($result);
$fn = $rows['first_name']; 
$ln = $rows['last_name'];
?>
<html>
    <head>
        <title>
            Contact Us
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/welcome_style.css">
        <style>
            .contactus_area{
                width: 100%;
                height: 450px;
                text-align:center;
            }
            .contactus_form{
                position: relative;
                text-align: center;
                margin:auto;
                width: 500px;
                height:330px;
                background-color:#333;
                color: aliceblue;
            }
            .con_inp{
                color: aliceblue;
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
                margin-right: 50px;
            }
            .con_social{
                margin-top: 20px;
                position: relative;
            }
            .con-dis
            {
                font-size: 25px; 
            }
        </style>
    </head>
    <body style="background-color:lightgray">
        <?php   
        if($_SESSION['whoo'] === 'teacher')
        {
            $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_teacher.html"); 
        }
        else{
            $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_learner.html"); 
        }
        ?>
        <div class="con_sub">Contact Us</div>
        <div class="contactus_area">
            <form class="contactus_form" style="font-size:16px;" action="wel_contactus.php" method="post">
                <span class="con-dis">Name : <?php echo $fn." ".$ln;?> </span>
                <br><br>
                <span class="con-dis">Subject : <input type="text" name="con_sub" required class="con_inp"></span><br><br>
                <span class="con-dis">Email Id : <?php echo $temp; ?></span>
                <input type="hidden" value="<?php echo $temp; ?>" name="con_email">
                <input type="hidden" value="<?php echo $fn." ".$ln;?>" name="con_name">
                <br><br>
                <span class="con-dis">Description : </span><textarea rows="4" cols="50" name="con_des" placeholder="Enter text here..." style="color:black;font-family: cursive;"></textarea><br><br>
                <button type="submit" class="con_btn">Submit</button>
            </form>
            <div class="con_social">
                <a href="https://www.facebook.com/ankitjsr9" target="_blank"><img src="../img/fb.png" class="social"></a>
                <a href="https://www.instagram.com/_ankit__9/" target="_blank"><img src="../img/insta.png" class="social"></a>
                <a href="https://twitter.com/_ankit_9" target="_blank"><img src="../img/twitter.png" class="social"></a>
                <a href="https://in.linkedin.com/in/ankit-kumar-a332a3194" target="_blank"><img src="../img/linkedin.png" style="width: 60px;
                height: 60px;
                "></a>
            </div>
        </div>
        <script src="js/java_script.js"></script>
        <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/project/"; include($fott."footer.html");   ?>
    </body>
</html>
