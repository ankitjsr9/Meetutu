<?php
include("connection.php");
session_start();
if($_SESSION['whoo']=='learner'){
    header('Location: welcome_learner.php');
}
else if(!$_SESSION['whoo']){
    header('Location: ../log_in.php');
}
$temp = $_SESSION['email_id'];
$ql = "select first_name from teacher where email_id='$temp'";
$result = mysqli_query($conn, $ql);
$rows = mysqli_fetch_assoc($result);
$fn = $rows['first_name'];
?>
<html>
    <head>
        <title> Welcome
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/welcome_style.css">
        <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
        <link href="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet" />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
        <link
              rel="stylesheet"
              href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
              type="text/css"
              />
        <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <style>
            .geocoder {
                position: relative;
                margin: 10px auto;
                width: 500px;
                height: 20px;
            }
            .mapboxgl-ctrl-geocoder {
                min-width: 100%;
            }
            #map
            {
                position: relative;
                margin: 30px auto;
                width:900px;
                height:500px;
            }
            .marker {
                background-image: url('../img/icon_l.png');
                background-size: cover;
                width: 24px;
                height: 35px;
                cursor: pointer;
            }
            .mapboxgl-popup {
                max-width: 200px;
            }
            .mapboxgl-popup-content {
                text-align: center;
                font-family: 'Open Sans', sans-serif;
            }
        </style>
    </head>
    <body>
        <?php   $head = $_SERVER["DOCUMENT_ROOT"]."/php/header/"; include($head."header_teacher.html");   ?>
        <div id="geocoder" class="geocoder"></div>
        <div id="map"></div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYmFidXJhbzczIiwiYSI6ImNrYWo5Mnl3MTA4OHIyenA2aDJsZGpndjEifQ.0bOJ6hDWNhCax5FLBQSXlA';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [86.2029,22.8046],
                zoom: 12
            });
            var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            });
            map.addControl(
                new mapboxgl.GeolocateControl({
                    positionOptions: {
                        enableHighAccuracy: true
                    },
                    trackUserLocation: true
                })
            );
            document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
            var geojson = {
                type: 'FeatureCollection',
                features: [
                    <?php   $poss = $_SERVER["DOCUMENT_ROOT"]."/database/"; include($poss."java_input_learner.txt");   ?>
                ]};
            geojson.features.forEach(function(marker) {
                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker';
                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                    .setLngLat(marker.geometry.coordinates)
                    .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                              .setHTML("<h3><a href='personal_info_learner.php?email_id=" + marker.properties.email_id + "'>" + marker.properties.title + "</a></h3><p style='font-size:13px;'>Wants to learn : " + marker.properties.description + "</p>"))
                    .addTo(map);
            });
        </script> 
        <?php   $fott = $_SERVER["DOCUMENT_ROOT"]."/"; include($fott."footer.html");   ?>
    </body>
</html>


