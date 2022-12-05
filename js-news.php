<?php
session_start();
require_once "db.php";

if(!empty($_GET['email'])){
    $email = htmlspecialchars($_GET['email']);

    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        $reqVErification = $db->prepare("select * from newsletter where emailNews=? and etat<>'supprimer'");
        $reqVErification->execute(array($email));
        $compteur = $reqVErification->rowCount();

        if ($compteur<=0){
            $date = date("Y-m-d H:i:s");
            $reqEmail = $db->prepare("insert into newsletter (emailNews,dateRecep) values (?,?)");
            $reqEmail->execute(array($email,$date));

        }else{
            echo "<p class='alert-success'>Vous êtes déja abonné à notre newsletter</p>";
        }

    }else{
        echo "<p class='alert-warning'>Veuillez entrer une adresse email correcte</p>";
    }
}
