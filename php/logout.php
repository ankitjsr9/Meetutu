<?php
include("connection.php");
session_start();
try{
    if(!$_SESSION['whoo']){
        throw new Exception('Please Login First');
    }
}
catch(Exception $e) { 
    echo "\n Exception Caught", $e->getMessage(); 
    header('Location: ../log_in.php');
} 
error_reporting(0); 
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
echo "Successfully Logout";
echo "<br>";
echo "Please wait";
echo "<script>setTimeout(\"location.href='../log_in.php';\",2000);</script>"
?>