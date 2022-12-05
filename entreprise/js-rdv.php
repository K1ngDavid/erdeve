<?php
session_start();
include "../db.php";

if (isset($_GET['idAgent'])){
    $idAgent = htmlspecialchars($_GET['idAgent']);
    $entreprise = htmlspecialchars($_GET['entreprise']);
    $dateRDV = htmlspecialchars($_GET['dateRDV']);
    $heureRDV = htmlspecialchars($_GET['heureRDV']);
    $consigneRDV = htmlspecialchars($_GET['consigneRDV']);
    $priorite = htmlspecialchars($_GET['priorite']);
    $intituleRDV = htmlspecialchars($_GET['intituleRDV']);
    $proprietaire = htmlspecialchars($_GET['proprietaire']);

    $date = date("Y-m-d H:i:s");

    if (!empty($idAgent) and !empty($entreprise) and !empty($dateRDV)
        and !empty($heureRDV) and !empty($consigneRDV) and !empty($priorite)
        and !empty($proprietaire) and !empty($intituleRDV)){

        $dateConv = strtotime($dateRDV);

        $dateDuJour = strtotime(date("Y-m-d"));

        $heureConv = strtotime($heureRDV.'+ 5 minutes');

        $heureActuelle = strtotime(date('H:i'));

        if ( $dateConv >= $dateDuJour){

            if ($heureConv > $heureActuelle ) {

                $reqRDV = $db->prepare("insert into rendezvous(idUtilisateur, idEntreprise, idAgent,intitulerdv, daterdv, heurerdv, consigne,priorite,dateRecep) values(?,?,?,?,?,?,?,?,?)");
                $reqRDV ->execute(array($proprietaire, $entreprise, $idAgent, $intituleRDV, $dateRDV, $heureRDV, $consigneRDV,$priorite, $date));


            }else{
                echo "<p class='alert-warning'>Vous devez choisir une heure ultérieure</p>";

            }

        }else{
            echo "<p class='alert-warning'>Vous devez choisir une date ultérieure</p>";
        }

    }else{
        echo "<p class='alert-warning'>Veuillez remplir correctement le formulaire de programmation de RDV</p>";
    }

}
