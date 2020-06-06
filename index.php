<!DOCTYPE html>
<html>
    <head>
        <title>MEETUTU-The joy of meeting an expert teacher</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/ajax_googleapies.js"></script>
<!--        <script src="js/maxcdn_bootstrapcdn.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/code_jquery.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .social{
                width: 60px;
                height: 60px;
                margin-right: 25px;
                margin-left: 25px;
            }
            .con_social{
                margin: 40px auto;
                font-size: 20px;
                text-align:center;
            }
            
        </style>
    </head>
    <body class="back">
        <?php   $hed = $_SERVER["DOCUMENT_ROOT"]."/"; include($hed."header.html");?>
        <div class="babu">
        <div class="area-slide-show">

                <img class="mySlides w3-animate-fading" src="img/slide1.png" style="width:100%;height: 100%;">
                <img class="mySlides w3-animate-fading" src="img/slide2.jpg" style="width:100%;height: 100%;">
                <img class="mySlides w3-animate-fading" src="img/slide3.png" style="width:100%;height: 100%;">
                <img class="mySlides w3-animate-fading" src="img/slide4.png" style="width:100%;height: 100%;">

        </div>
        </div>
        <div>
            <p style="font-size: 20px">The fundamentals of this website are simple. The users that get on it are either learners or teachers or both. They can offer to teach something or just discover something to learn. Call it social learning + teaching.</p>

        </div>
        
        <div class="con_social">
            Follow me on    : 
            <a href="https://www.facebook.com/ankitjsr9" target="_blank"><img src="img/fb.png" class="social"></a>
            <a href="https://www.instagram.com/_ankit__9/" target="_blank"><img src="img/insta.png" class="social"></a>
            <a href="https://twitter.com/_ankit_9" target="_blank"><img src="img/twitter.png" class="social"></a>
            <a href="https://in.linkedin.com/in/ankit-kumar-a332a3194" target="_blank"><img src="img/linkedin.png" class="social"></a>
        </div>
        <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
        <script src="js/java_script.js"></script>
        <script>
            var myIndex = 0;
            carousel();
            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 2000);    
            }
        </script>
        <script>


            var $el = $(".arenews");
            function anim() {
                var st = $el.scrollTop();
                var sb = $el.prop("scrollHeight")-$el.innerHeight();
                $el.animate({scrollTop: st<sb/2 ? sb : 0}, sb*25, anim);
            }
            function stop(){
                $el.stop();
            }
            anim();
            $el.hover(stop, anim);

        </script>
        <a href="https://www.hitwebcounter.com" target="_blank">
<img src="https://hitwebcounter.com/counter/counter.php?page=7431492&style=0025&nbdigits=4&type=page&initCount=0" title="Web Counter" Alt="counter free"   border="0" style="margin-top:30px;text-align:center;position:absolute;margin-left:50%;">
        </a> 
    </body>
</html>