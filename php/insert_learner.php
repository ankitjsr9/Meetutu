<?php
include("connection.php");
if(!$_POST['first_name']){
    header('Location: ../sign_up.php');
}
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_no = $_POST['mobile_no'];
$learn = $_POST['learn'];
$email_id = $_POST['email_id'];
$password = hash('sha512', $_POST['password1']);
if ($conn->connect_error){
    die("Connection Error(". mysqli_connect_error().')'. mysqli_connect_error());
} 
else{
    $sel = "select email_id from learner where email_id = ?";
    $stmt = $conn->prepare($sel);
    $stmt->bind_param("s", $email_id);
    $stmt->execute();
    $stmt->bind_result($email_id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum!=0){
        echo "Email id is in use";
        $stmt->close();
        $conn->close();
    }
    else{
        $stmt->close();
        $ins = "insert into learner(first_name, last_name, mobile_no,latti,longi, learn, email_id, password,profilesource) values('$first_name', '$last_name', '$mobile_no','','', '$learn','$email_id', '$password','')";
        if ($conn->query($ins) === TRUE){
            echo "Account Created successfully";
            echo "<br>";
            echo "Redirecting to Sign In Page";
            echo "<script>setTimeout(\"location.href='../log_in.php';\",2000);</script>";
        }else
        {
            echo "An error Occur";
            echo "<br>";
            echo "Please Retry";
            echo "<script>setTimeout(\"location.href='../sign_up.php';\",2000);</script>"; 
        }
    }
}
?>