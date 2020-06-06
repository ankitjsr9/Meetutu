<?php include("connection.php");
if(!$_POST['con_email']){
    header('Location: wel_contactus.php');
}
    session_start();
    $name = $_POST['con_name'];
    $sub = $_POST['con_sub'];
    $email_id = $_POST['con_email'];
    $des = $_POST['con_des'];
    $whoo = $_SESSION['whoo'];
    $qr = "insert into contactus(name,subject,email_id,des,whoo) values('$name','$sub','$email_id','$des','$whoo')";
if($conn->query($qr) === TRUE){
    echo "Request Submitted";
    echo "<br>Redirecting to Home Page";
    echo "<script>setTimeout(\"location.href='../index.php';\",2000);</script>";
}
else
{
    echo "Something went Wrong. Please try again";
    echo "<script>setTimeout(\"location.href='../contactus.php';\",2000);</script>";
}
?>