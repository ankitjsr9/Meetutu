<?php
include("connection.php");
session_start();
error_reporting(0);
if($_SESSION['whoo']=='teacher'){
    header('Location: profile_teacher.php');
}
else if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}
$temp = $_SESSION['email_id'];
$pw = $_SESSION['password'];
$ql = "select first_name,last_name,mobile_no,learn,password,profilesource from learner where email_id='$temp'";
$result = mysqli_query($conn, $ql);
$rows = mysqli_fetch_assoc($result);
$fn = $rows['first_name'];
$ln =$rows['last_name'];
$sp = $rows['learn'];
$mb = $rows['mobile_no'];
$pic = $rows['profilesource'];
$latti = $rows['latti'];
$longi = $rows['longi'];
?>
<html>
    <head>
        <title>
            Profile
        </title>
        <script type='text/javascript'>
            function preview_image(event) 
            {
                var reader = new FileReader();
                reader.onload = function()
                {
                    var output = document.getElementById('ppimage');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
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
    $picc="../images/learner/".$temp.".jpg";
}
                ?>
                <img id="ppimage" src="<?php echo $picc; ?>">
            </div>
            <form action="update_learner.php" method="post" enctype="multipart/form-data">
                <input type="file" name="upload_image" style="position:absolute;margin-top:447px;margin-left:155px;" accept="image/*" onchange="preview_image(event)" value="<?php echo $picc; ?>">
                <div class="vl">
                    <div class="form-box">
                        First name : <input type="text" name="first_name" value="<?php  echo $fn; ?>" required class="input-field">
                        <br>
                        <br>
                        Last name : <input type="text" name="last_name" value="<?php echo $ln; ?>" required class="input-field">
                        <br>
                        <br>
                        Mobile no. :<input type="text" name="mobile_no" value="<?php echo $mb; ?>" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required class="input-field">
                        <br>
                        <br>
                        Wants to Learn :<div class="autocomplete" required>    
                        <input id="myInput" type="text" name="learn" value="<?php echo $sp; ?>"  required class="input-field">
                        </div>
                        <br>
                        <br>
                        Email Id :
                        <input type="email" name="email_id" value="<?php echo $temp; ?>" required class="input-field">
                        <br>
                        <br>
                        <input type="hidden" id="latti_l" name="latti">
                        <input type="hidden" id="longi_l" name="longi">
                        <button type="button" onclick="getLocation()" required class="profile-button" style="position:relative;width:200px;">Allow Location access</button>
                        <br>
                        Change Password :<input type="Password" name="password1" required value="<?php echo $pw; ?>" minlength="8"class="input-field">
                        <br>
                        <br>
                        <button type="submit" class="profile-button" >Save</button>
                        <button type="button" class="profile-button"><a href="welcome_learner.php">Cancel</a></button>
                    </div>
                </div>
            </form><?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
        </div>
        <script>
            function getLocation() {
                navigator.geolocation.getCurrentPosition(showPosition); 
                function showPosition(position) {
                    document.getElementById("latti_l").value = position.coords.latitude;
                    document.getElementById("longi_l").value = position.coords.longitude;
                }
            }
        </script>
        <script src="../js/java_script.js"></script>
    </body>
</html>





