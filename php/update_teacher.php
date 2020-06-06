<?php 
include("connection.php");
session_start();
if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}else if($_SESSION['whoo']=='learner'){
    echo "Something Went wrong";
    header('Location: profile_learner.php');
}
error_reporting(0);
$tem = $_SESSION['email_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_no = $_POST['mobile_no'];
$specialization = $_POST['specialization'];
$email_id = $_POST['email_id'];
$password = hash('sha512', $_POST['password1']);
$latti = $_POST['latti'];
$longi = $_POST['longi'];
$expe = $_POST['expe'];
//$filename = $_FILES["upload_image"]["name"];
$folder='';
$tempname = $_FILES["upload_image"]["tmp_name"];
if($tempname!=''){
    $folder = "../images/teacher/".$tem.".jpg";
    move_uploaded_file($tempname,$folder);
}
if ($conn->connect_error){
    die("Connection Error(". mysqli_connect_error().')'. mysqli_connect_error());
} 
else {
    $sel = "select email_id from teacher where email_id = ?";
    if($folder!=''){
        $up = "update teacher set first_name='$first_name', last_name='$last_name', mobile_no='$mobile_no', specialization='$specialization',exp='$expe', email_id='$email_id',latti='$latti',longi='$longi', password='$password',profilesource='$folder' where email_id='$tem'";}
    else{
        $up = "update teacher set first_name='$first_name', last_name='$last_name', mobile_no='$mobile_no', specialization='$specialization',exp='$expe', email_id='$email_id',latti='$latti',longi='$longi', password='$password' where email_id='$tem'";
    }
    $stmt = $conn->prepare($sel);
    $stmt->bind_param("s", $email_id);
    $stmt->execute();
    $stmt->bind_result($email_id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum!=0){
        if($email_id==$tem)
        {
            if ($conn->query($up) === TRUE) {
                if($latti!=0){
                    $file = "../database/java_input_teacher.txt";
                    $java_input_teacher = ",{
type: 'Feature',
geometry: {
type: 'Point',
coordinates: [$longi, $latti]
},
properties: {
title: '$first_name $last_name',
description: '$specialization',
email_id: '$email_id',
expe: '$expe'
}
}";
                    file_put_contents($file, $java_input_teacher, FILE_APPEND);}
                echo "Record updated successfully";
                echo "<script>setTimeout(\"location.href='welcome_teacher.php';\",2000);</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }  
        }
        else
        {
            echo "Email id is in use";
            $stmt->close();
            $conn->close();
        }
    }
    else
    {
        if ($conn->query($up) === TRUE) {
            echo "Record updated successfully";
            $_SESSION['email_id'] = $email_id;
            echo "<script>setTimeout(\"location.href='welcome_teacher.php';\",2000);</script>";
        }
    }
}


