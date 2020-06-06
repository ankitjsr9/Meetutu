<?php include("connection.php");
session_start();
if(!$_SESSION['whoo'])
{
    header('Location: ../log_in.php');
}
if(!$_POST['con_name'])
{
    header('LOcation: con_contactus.php');
}
$name = $_POST['con_name'];
$sub = $_POST['con_sub'];
$email_id = $_POST['con_email'];
$des = $_POST['con_des'];
$whoo = $_SESSION['whoo'];
$qr = "insert into contactus(name,subject,email_id,des,whoo) values('$name','$sub','$email_id','$des','$whoo')";
if($conn->query($qr) === TRUE){
    echo "Request Submitted";
    echo "<br>Redirecting to Welcome Page";
    if($_SESSION['whoo'] =='teacher'){
        echo "<script>setTimeout(\"location.href='welcome_teacher.php';\",2000);</script>"; 
    }else{
        echo "<script>setTimeout(\"location.href='welcome_learner.php';\",2000);</script>";
    }
}
else
{
    echo "Something went Wrong. Please try again";
    echo "<script>setTimeout(\"location.href='con_contactus.php';\",2000);</script>";
}
?>