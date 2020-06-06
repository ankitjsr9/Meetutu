<?php
include("connection.php");
session_start();
if(!$_GET['email_id'])
{
    header('Location: welcome_learner.php');
}
if($_SESSION['whoo']=='teacher'){
    header('Location: personal_info_learner.php');
}
else if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}
error_reporting(0);
$temp = $_SESSION['email_id'];
$temp2 = $_GET['email_id'];
$ql = "select first_name from learner where email_id='$temp'";
$ql2 = "select first_name,last_name,mobile_no,specialization,exp,password,profilesource from teacher where email_id='$temp2'";
$result = mysqli_query($conn, $ql);
$result2 = mysqli_query($conn, $ql2);
$rows = mysqli_fetch_assoc($result);
$rows2 = mysqli_fetch_assoc($result2);
$fn = $rows['first_name'];
$fn2 = $rows2['first_name'];
$ln =$rows2['last_name'];
$sp = $rows2['specialization'];
$mb = $rows2['mobile_no'];
$pic = $rows2['profilesource'];
$expe = $rows2['exp'];
?>
<html>
    <head>
        <title>
            Teacher Profile
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/welcome_style.css">
    </head>
    <body style="background-color:lightgray">
        <?php   $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_learner.html");?>
        <div class="update-form">
            <div class="profile-image">
                <?php if($pic==""){
    $picc="../images/custom_image.png";
}else
{
    $picc="../images/teacher/".$temp2.".jpg";
}
                ?>
                <img id="ppimage" src="<?php echo $picc; ?>">
            </div>
            <div class="vl">
                <div class="form-box" style="font-size:35px;width:620px;height:450px;font-family:cursive;">
                    Name : <?php echo $fn2." ".$ln;?>
                    <br>
                    <br>
                    Mobile no. : <?php echo $mb; ?>
                    <br>
                    <br>
                    Area of specialization : <?php echo $sp; ?>
                    <br>
                    <br>
                    Exprience of : <?php echo $expe; ?> years
                    <br>
                    <br>
                    Email Id : <?php echo $temp2; ?>
                    <br>
                    <br>
                    <button type="button" class="profile-button" style="width:400px;height:50px;font-size:30px;"><a href="https://wa.me/91<?php echo $mb; ?>?text=Hello" target="_blank">Click Here to Chat</a></button>
                </div>
            </div>
        </div>
        <script src="../js/java_script.js"></script>
        <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
    </body>
</html>




