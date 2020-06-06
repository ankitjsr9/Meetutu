<?php
include("connection.php");
session_start();
error_reporting(0);
if($_SESSION['whoo']=='learner'){
    header('Location: profile_learner.php');
}
else if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}
$temp = $_SESSION['email_id'];
$ql = "select first_name,last_name,mobile_no,specialization,exp,password,profilesource,latti,longi from teacher where email_id='$temp'";
$pw = $_SESSION['password'];
$result = mysqli_query($conn, $ql);
$rows = mysqli_fetch_assoc($result);
$fn = $rows['first_name'];
$ln =$rows['last_name'];
$sp = $rows['specialization'];
$mb = $rows['mobile_no'];
$pic = $rows['profilesource'];
$latti = $rows['latti'];
$longi = $rows['longi'];
$expe = $rows['exp'];
if($latti=='')
{
    $latti = 0;
    $longi = 0;
}
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
        <?php   $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_teacher.html");?>
        <div class="update-form">
            <div class="profile-image">
                <?php if($pic==""){
    $picc="../images/custom_image.png";
}else
{
    $picc="../images/teacher/".$temp.".jpg";
}
                ?>
                <img id="ppimage" src="<?php echo $picc ?>">
            </div>
            <form action="update_teacher.php" method="post" enctype="multipart/form-data">
                <input type="file" name="upload_image" style="position:absolute;margin-top:447px;margin-left:155px;" accept="image/*" onchange="preview_image(event)">
                <div class="vl" style="height:640px;">
                    <div class="form-box" style="height:600px;">
                        First name : <input type="text" name="first_name" value="<?php  echo $fn; ?>" required class="input-field">
                        <br>
                        <br>
                        Last name : <input type="text" name="last_name" value="<?php echo $ln; ?>" required class="input-field">
                        <br>
                        <br>
                        Mobile no. :<input type="text" name="mobile_no" value="<?php echo $mb; ?>" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required class="input-field">
                        <br>
                        <br>
                        Area of specialization :<div class="autocomplete" required>    
                        <input id="myInput" type="text" name="specialization" value="<?php echo $sp; ?>"  required class="input-field">
                        </div>
                        <br>
                        <input type="hidden" id="latti_t" name="latti">
                        <input type="hidden" id="longi_t" name="longi">
                        <button type="button" onclick="getLocation()" required class="profile-button" style="position:relative;width:200px;">Allow Location access</button>
                        <br>
                        <br>
                        Experience of : <input type="number" name="expe" value="<?php echo $expe; ?>" required class="input-field" style="width:100px;"> Years
                        <br>
                        <br>
                        Email Id :
                        <input type="email" name="email_id" value="<?php echo $temp; ?>" required class="input-field">
                        <br>
                        Change Password : <input type="Password" name="password1" required value="<?php echo $pw; ?>" minlength="8"class="input-field">
                        <br><br>
                        <button type="submit" class="profile-button" >Save</button>
                        <button type="button" class="profile-button"><a href="welcome_teacher.php">Cancel</a></button>
                    </div>
                </div>
            </form><?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
        </div>
        <script>
            function getLocation() {
                navigator.geolocation.getCurrentPosition(showPosition); 
                function showPosition(position) {
                    document.getElementById("latti_t").value = position.coords.latitude;
                    document.getElementById("longi_t").value = position.coords.longitude;
                }
            }
        </script>
        <script src="../js/java_script.js"></script>
    </body>
</html>



