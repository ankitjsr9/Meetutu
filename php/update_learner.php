<?php 
include("connection.php");
session_start();
error_reporting(0);
if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}else if($_SESSION['whoo']=='teacher'){
    echo "Something Went wrong";
    header('Location: profile_teacher.php');
}
$tem = $_SESSION['email_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_no = $_POST['mobile_no'];
$learn = $_POST['learn'];
$email_id = $_POST['email_id'];
$latti = $_POST['latti'];
$longi = $_POST['longi'];
$password = hash('sha512', $_POST['password1']);
//$filename = $_FILES["upload_image"]["name"];
$tempname = $_FILES["upload_image"]["tmp_name"];
if($tempname!=''){
    $folder = "../images/learner/".$tem.".jpg";
    move_uploaded_file($tempname,$folder);
}
if ($conn->connect_error){
    die("Connection Error(". mysqli_connect_error().')'. mysqli_connect_error());
} 
else {
    $sel = "select email_id from learner where email_id = ?";
    if($folder!=''){
        $up = "update learner set first_name='$first_name', last_name='$last_name', mobile_no='$mobile_no', learn='$learn', email_id='$email_id',latti='$latti',longi='$longi', password='$password',profilesource='$folder' where email_id='$tem'";
    }
    else
    {
        $up = "update learner set first_name='$first_name', last_name='$last_name', mobile_no='$mobile_no', learn='$learn', email_id='$email_id',latti='$latti',longi='$longi', password='$password' where email_id='$tem'";
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
                if($latti){
                    $file = "../database/java_input_learner.txt";
                    $java_input_learner = ",{
type: 'Feature',
geometry: {
type: 'Point',
coordinates: [$longi, $latti]
},
properties: {
title: '$first_name $last_name',
description: '$learn',
email_id: '$email_id'
}
}";
                    file_put_contents($file, $java_input_learner, FILE_APPEND);}
                echo "Record updated successfully";
                echo "<script>setTimeout(\"location.href='welcome_learner.php';\",2000);</script>";
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
            echo "<script>setTimeout(\"location.href='welcome_learner.php';\",2000);</script>";
        }
    }
}


