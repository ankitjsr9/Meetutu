<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/ajax_googleapies.js"></script>
        <script src="js/maxcdn_bootstrapcdn.js"></script>
        <script src="js/code_jquery.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
            }
            html {
                box-sizing: border-box;
            }
            *, *:before, *:after {
                box-sizing: inherit;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
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
            }
            .container::after, .row::after {
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
    </head>
    <body class="back">
        <?php   $hed = $_SERVER["DOCUMENT_ROOT"]."/"; include($hed."header.html");?>
        <div class="about-section">
            <h1>About Us</h1>
            <p>The fundamentals of this website are simple. The users that get on it are either learners or teachers or both. They can offer to teach something or just discover something to learn. Call it social learning + teaching.</p>
            <p>We are here to help Teacher as well as Learner to find each other and make further communication in a Simple anad easy way. We provide location on map of Teachers and Students with there details.</p>
        </div>
        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="card">
                <img src="img/ankit.jpeg" alt="Jane" style="width:30.3%; border-radius:20px;">
                <div class="container">
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