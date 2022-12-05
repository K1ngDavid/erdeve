<?php
session_start();
include "../db.php";

if (isset($_GET['nomEntreprise'])){
    $souscription = htmlspecialchars($_GET['souscription']);
    $nomEntreprise = htmlspecialchars($_GET['nomEntreprise']);
    $activite = htmlspecialchars($_GET['activite']);
    $email = htmlspecialchars($_GET['email']);
    $mdpFirst = htmlspecialchars($_GET['mdpFirst']);
    $mdpSecond = htmlspecialchars($_GET['mdpSecond']);


    if ($souscription== 1){
        $id= 'price_1JIChgB3Y0RxQBUkJSrQI8Dh';

    }else if ($souscription ==3){
        $id = 'price_1JF3LIB3Y0RxQBUk4tCuGD4h';

    }else{
        $id = 'price_1JF3M0B3Y0RxQBUk7qE8xSyx';
    }

    $tab = array();
    $tab['forfait'] = $id;
    $tab = json_encode($tab);
    file_put_contents('forfait.json',$tab);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $reqUser  = $db->prepare("select * from utilisateur where adresseEmail =? and etat='activer'");
        $reqUser->execute(array($email));
        $compteurUser = $reqUser->rowCount();

        if ($compteurUser<1){

            if ($mdpFirst == $mdpSecond){

                $taille = strlen($mdpFirst);
                if ($taille>7){
                    $date = date("Y-m-d H:i:s");
                    $mdpHash = sha1($mdpFirst);

                    $reqUtilisateur = $db->prepare("insert into utilisateur (nomEntreprise,adresseEmail,mdp,dateRecep) values (?,?,?,?)");
                    $reqUtilisateur ->execute(array($nomEntreprise, $email,$mdpHash, $date));

                    $reqLastUtilisateur = $db->query("select * from utilisateur order by id desc limit 1");
                    $afficheLastUtilisateur = $reqLastUtilisateur->fetch();

                    $reqAbonnement = $db->prepare("insert into abonnement (idUser,dateRecep) values (?,?)");
                    $reqAbonnement->execute(array($afficheLastUtilisateur['id'],$date));

                    $_SESSION['idUser']= $afficheLastUtilisateur['id'];
                    $_SESSION['nomUser']= $afficheLastUtilisateur['nomEntreprise'];
                    $_SESSION['mailUser']= $afficheLastUtilisateur['adresseEmail'];

                    $tab = array();
                    $tab['id']= $afficheLastUtilisateur['id'];
                    $tab['nom']= $afficheLastUtilisateur['nomEntreprise'];
                    $tab['mail']= $afficheLastUtilisateur['adresseEmail'];
                    file_put_contents('info-client.json',json_encode($tab));

                }else{
                    echo "<p class='alert-danger'>Votre mot depasse doit contenir au minimum 8 caracteres</p>";
                }

            }else{
                echo "<p class='alert-danger'>Les mots de passe ne correspondent pas</p>";
            }

        }else{
            echo "<p class='alert-danger'>Cette adresse email est deja utilisee</p>";
        }

    }else{
        echo "<p class='alert-danger'>Veuillez entrer une adresse email correcte</p>";
    }

}
