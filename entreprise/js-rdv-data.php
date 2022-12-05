<?php
session_start();
include "../db.php";

if (isset($_GET['proprietaire'])){

    $proprietaire = htmlspecialchars($_GET['proprietaire']);

    $reqRDV = $db->prepare("select * from rendezvous where idUtilisateur=?");
    $reqRDV->execute(array($proprietaire));

    while ($afficheRDV = $reqRDV->fetch()){

        $programmation = $afficheRDV['daterdv'].'T'.$afficheRDV['heurerdv'];

        $additionalArray = array(
            'title' => $afficheRDV['intitulerdv'],
            'start' => $programmation,
        );

//open or read json data
        $data_results = file_get_contents('programme.json');
        $tempArray = json_decode($data_results);

//append additional json to json file
        $tempArray[] = $additionalArray ;
        $jsonData = json_encode($tempArray);

        file_put_contents('programme.json', $jsonData);

        echo $jsonData;
    }
}