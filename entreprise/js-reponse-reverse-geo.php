<?php
session_start();
include "../db.php";

file_put_contents('reponse-reverse-geo.json',$_GET['donnees']);