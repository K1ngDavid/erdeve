<?php
session_start();
include "../db.php";

if (isset($_GET['nom'])){

    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $email = htmlspecialchars($_GET['email']);
    $entreprise = htmlspecialchars($_GET['entreprise']);
    $telephone = htmlspecialchars($_GET['telephone']);

    if (!empty($nom) and !empty($prenom) and !empty($email) and !empty($telephone)){

        $mdp = '1234';
        $mdpHash = sha1($mdp);

        $date = date("Y-m-d H:i:s");

        if (filter_var($email,FILTER_VALIDATE_EMAIL)){

            $reqEntreprise = $db->prepare("select * from utilisateur where id=?");
            $reqEntreprise->execute(array($entreprise));
            $afficheEntreprise = $reqEntreprise->fetch();
            $compte = 'commercial';

            $reqTelepro = $db->prepare("insert into commercial (idEntreprise, cuStripe ,nom, prenom, telephone, emailConnexion,mdp,dateRecep ) values (?,?,?,?,?,?,?,?)");
            $reqTelepro->execute(array($afficheEntreprise['id'], $afficheEntreprise['cuStripe'], $nom, $prenom, $telephone, $email, $mdpHash, $date));

            $reqLastTelepro = $db->query("select * from telepro order by id desc limit 1");
            $afficheLastTelepro = $reqLastTelepro->fetch();

            $reqTypeCompte = $db->prepare("insert into typeagent(idEntreprise,idAgent,compte,dateRecep)values (?,?,?,?)");
            $reqTypeCompte->execute(array($afficheEntreprise['id'],$afficheLastTelepro['id'],$compte,$date));



        }else{

            echo "<p class='alert-warning'>Veuillez entrer une adresse email valide</p>";
        }

    }else{
        echo "<p class='alert-warning'>Veuillez remplir correctement le formulaire</p>";
    }
}
