<?php include("connection.php");
session_start();
if(!$_SESSION['whoo'])
{
    header('Location: ../log_in.php');
}
$temp = $_SESSION['email_id'];
if($_SESSION['whoo'] === 'teacher'){
    $ql = "select first_name from teacher where email_id='$temp'";}
else{
    $ql = "select first_name from learner where email_id='$temp'";
}
$result = mysqli_query($conn, $ql);
$rows = mysqli_fetch_assoc($result);
$fn = $rows['first_name'];
?>
<html>
    <head>
        <title>
            About Us
        </title>
        <style>
            html {
                box-sizing: border-box;
            }
            *, *:before, *:after {
                box-sizing: inherit;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
                margin: 8px;
                text-align: center;
            }
            .about-section {
                padding: 50px;
                text-align: center;
                background-color: #474e5d;
                color: black;
            }
            .container {
                padding: 0 16px;
                width: 70.3%;
                color: black;
                margin-left: 191px;
            }
            .container::after, .row::after 2{
                content: "";
                clear: both;
                display: table;
            }
            .title {
                color: black;
            }
            .button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 33.3%;
            }
            .button:hover {
                background-color: #555;
            }
            @media screen and (max-width: 650px) {
                .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/welcome_style.css">
    </head>
    <body>
        <?php   

        if($_SESSION['whoo'] === 'teacher')
        {
            $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_teacher.html"); 
        }
        else{
            $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_learner.html"); 
        }?>
        <div class="about-section">
            <h1>About Us</h1>
            <p>The fundamentals of this website are simple. The users that get on it are either learners or teachers or both. They can offer to teach something or just discover something to learn. Call it social learning + teaching.</p>
            <p>We are here to help Teacher as well as Learner to find each other and make further communication in a Simple anad easy way. We provide location on map of Teachers and Students with there details.</p>
        </div>
        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="card">
                <img src="../img/ankit.jpeg" alt="Jane" style="width:30.3%; border-radius:20px;">
                <div class="container" >
                    <h2>Ankit Kumar</h2>
                    <p class="title" style="font-size: 20px;font-family: Candara;">Web designer,Content Creator,Database Administrator,Web Developer</p>
                    <p style="font-size: 20px;">ankitjsr9@gmail.com</p>
                    <p><a href="https://mail.google.com/mail/?extsrc=mailto&url=mailto%3A%3Fto%3Dankitjsr9%40gmail.com" target="_blank"><button class="button">Contact</button></a></p>
                </div>
            </div>
        </div>
         <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
    </body>
</html>
