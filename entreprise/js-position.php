<?php
session_start();
include"../db.php";


if (isset($_GET['latitude']) and isset($_GET['longitude'])){
    $url ='https://maps.googleapis.com/maps/api/geocode/json?latlng='.$_GET['latitude'].','.$_GET['longitude'].'&key=AIzaSyBSef9Ev3J-afhMZhVolYkntZkNLOWVlXI';

    $tab = array();
    $tab['latitude'] = htmlspecialchars($_GET['latitude']);
    $tab['longitude'] = htmlspecialchars($_GET['longitude']);
    $tab['src'] = $url;
    file_put_contents('reverse-geo.json',json_encode($tab));

    ?>
    <script>

    </script>
<?php
}
