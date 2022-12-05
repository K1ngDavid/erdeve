<?php
session_start();
include"../db.php";
if(isset($_GET['adresse'])){
    $adresse = htmlspecialchars($_GET['adresse']);
    $latitude = htmlspecialchars($_GET['latitude']);
    $longitude = htmlspecialchars($_GET['longitude']);
    $entreprise = htmlspecialchars($_GET['entreprise']);
    $date = date("Y-m-d H:i:s");

    $reqPosition = $db->prepare("select * from coorduseradmin where idEntreprise=?");
    $reqPosition->execute(array($entreprise));

    $compteurPosition = $reqPosition->rowCount();

    if($compteurPosition == 0){
        $req = $db->prepare("insert into coorduseradmin(idEntreprise, adresse, latitude, longitude, dateRecep) values (?,?,?,?,?)");
        $req->execute(array($entreprise, $adresse,$latitude,$longitude,$date));

    }else{
        $req = $db->prepare("update coorduseradmin set adresse=?, latitude=?, longitude=?, dateRecep=? where idEntreprise=? ");
        $req->execute(array($adresse,$latitude,$longitude,$date,$entreprise));
    }
}
