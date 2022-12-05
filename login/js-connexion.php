<?php
session_start();

include "../db.php";

if (isset($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);
    $mdp = htmlspecialchars($_GET['mdp']);

    if (!empty($id) and !empty($mdp)){

        $taille = strlen($mdp);

        if ($taille>7){

            if (filter_var($id,FILTER_VALIDATE_EMAIL)){
                $mdpHash = sha1($mdp);
                $req = $db->prepare("select * from utilisateur where adresseEmail=? and mdp=? and activationCompte='activer'");
                $req->execute(array($id,$mdpHash));
                $compteur = $req->rowCount();

                if ($compteur == 1){

                    $afficheUser = $req->fetch();
                    $_SESSION['idUser']= $afficheUser['id'];
                    $_SESSION['nomUser']= $afficheUser['nomEntreprise'];
                    $_SESSION['mailUser']= $afficheUser['adresseEmail'];

                }else{
                    echo "<p class='alert-warning'>Identifiant ou mot de passe invalide</p>";
                }

            }else{
                echo "<p class='alert-warning'>Identifiant ou mot de passe invalide</p>";
            }

        }else{
            echo "<p class='alert-warning'>Identifiant ou mot de passe invalide</p>";
        }

    }else{
        echo "<p class='alert-warning'>Veuillez remplir correctement le formulaire</p>";
    }
}
