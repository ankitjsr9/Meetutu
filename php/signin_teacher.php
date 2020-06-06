<?php
include("connection.php");
if(!$_POST['email_id']){
    header('Location: ../log_in.php');
}
$email_id = $_POST['email_id'];
$pass = $_POST['password'];
$password = hash('sha512', $pass);
if ($conn->connect_error){
    die("Connection Error(". mysqli_connect_error().')'. mysqli_connect_error());
} 
else{
    $sel = "select email_id,password from teacher where email_id=? and password = ?";
    $stmt = $conn->prepare($sel);
    $stmt->bind_param("ss", $email_id,$password);
    $stmt->execute();
    $stmt->bind_result($email_id,$password);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum!=0){
        session_start();
        $_SESSION['email_id']=$email_id;
        $_SESSION['password']=$pass;
        $_SESSION['whoo'] = 'teacher';
        echo "Login Sucessfully";
        echo "<br>";
        echo "Please wait.......";
        echo "<script>setTimeout(\"location.href='welcome_teacher.php';\",1500);</script>";
    }
    else{
        echo "Invalid Email address or password....";
        echo "<br>";
        echo "Try again";
        echo "<script>setTimeout(\"location.href='../log_in.php';\",1500);</script>";
    }
}
?>