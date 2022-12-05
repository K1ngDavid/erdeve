<?php
session_start();
require_once "db.php";

if (!empty($_GET['nom']) and !empty($_GET['email']) and !empty($_GET['sujet']) and !empty($_GET['message'])){

    $nom = htmlspecialchars($_GET['nom']);
    $email = htmlspecialchars($_GET['email']);
    $sujet = htmlspecialchars($_GET['sujet']);
    $message = htmlspecialchars($_GET['message']);

    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        $date = date("Y-m-d H:i:s");

        $reqContact = $db->prepare("insert into contact(nom, emailContact, sujet, message, dateRecep) values (?,?,?,?,?)");
        $reqContact->execute(array($nom,$email,$sujet,$message,$date));

    }else{
        echo "<p class='alert-warning'>Veuillez entrer une adresse email correcte</p>";
    }

}else{
    echo "<p class='alert-warning'>Veuillez remplir correctement les champs obligatoires</p>";
}