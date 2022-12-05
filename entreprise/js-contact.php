<?php
session_start();
include"../db.php";

if (isset($_GET['etatRDV'])){
    $etatRDV = htmlspecialchars($_GET['etatRDV']);
    $date = date("Y-m-d H:i:s");

    if ($etatRDV =='maintenant'){

        $idEntrepriseUtilisateur = htmlspecialchars($_GET['idEntrepriseUtilisateur']);
        $idCompteUtilisateur = htmlspecialchars($_GET['idCompteUtilisateur']);
        $nomEntreprise = htmlspecialchars($_GET['nomEntreprise']);
        $emailEntreprise = htmlspecialchars($_GET['emailEntreprise']);
        $telephoneEntreprise = htmlspecialchars($_GET['telephoneEntreprise']);
        $posteCorrespondant = htmlspecialchars($_GET['posteCorrespondant']);
        $nomCorrespondant = htmlspecialchars($_GET['nomCorrespondant']);
        $emailCorrespondant = htmlspecialchars($_GET['emailCorrespondant']);
        $telephoneCorrespondant = htmlspecialchars($_GET['telephoneCorrespondant']);
        $latitude = htmlspecialchars($_GET['latitude']);
        $longitude = htmlspecialchars($_GET['longitude']);
        $adresse = htmlspecialchars($_GET['adresse']);
        $pays = htmlspecialchars($_GET['pays']);
        $ville = htmlspecialchars($_GET['ville']);
        $etat = htmlspecialchars($_GET['etat']);
        $codepostal = htmlspecialchars($_GET['codepostal']);
        $adresseComplementaire = htmlspecialchars($_GET['adresseComplementaire']);
        $agentCommercial = htmlspecialchars($_GET['agentCommercial']);
        $dateRDV = htmlspecialchars($_GET['dateRDV']);
        $heureRDV = htmlspecialchars($_GET['heureRDV']);
        $consigneRDV = htmlspecialchars($_GET['consigneRDV']);
        $priorite = htmlspecialchars($_GET['priorite']);
        $intituleRDV = htmlspecialchars($_GET['intituleRDV']);

        if (filter_var($emailEntreprise,FILTER_VALIDATE_EMAIL) ){

            $reqExistenceEntreprise = $db->prepare("select * from entrepriserdv where idUtilisateur=? and emailEntreprise=? and etat='valide'");
            $reqExistenceEntreprise->execute(array($idEntrepriseUtilisateur, $emailEntreprise));
            $compteurExistenceEntreprise = $reqExistenceEntreprise->rowCount();

            if ($compteurExistenceEntreprise<1){


                if (!empty($agentCommercial) and !empty($heureRDV) and !empty($dateRDV) and !empty($intituleRDV)){


                    if (filter_var($emailCorrespondant,FILTER_VALIDATE_EMAIL)){

                        $dateConv = strtotime($dateRDV);

                        $dateDuJour = strtotime(date("Y-m-d"));

                        $heureConv = strtotime($heureRDV.'+ 5 minutes');

                        $heureActuelle = strtotime(date('H:i'));

                        if ( $dateConv >= $dateDuJour){

                            if ($heureConv > $heureActuelle ){

                                $reqEntrepriseRDV = $db->prepare("insert into entrepriserdv(idUtilisateur, idCompteInsertion,nomEntreprise,EmailEntreprise,telephoneEntreprise,dateRecep) values (?,?,?,?,?,?)");
                                $reqEntrepriseRDV->execute(array($idEntrepriseUtilisateur,$idCompteUtilisateur,$nomEntreprise,$emailEntreprise,$telephoneEntreprise,$date));

                                $reqLastEntreprise = $db->query("select * from entrepriserdv order by id desc limit 1");
                                $afficheLastEntreprise = $reqLastEntreprise->fetch();

                                $reqEntrepriseAdresse = $db->prepare("insert into entrepriseadresse (idEntreprise, adresse, latitude, longitude, pays, ville, codePostal, etatAdresse, adresseComplementaire, dateRecep ) values(?,?,?,?,?,?,?,?,?,?)");
                                $reqEntrepriseAdresse->execute(array($afficheLastEntreprise['id'], $adresse, $latitude, $longitude, $pays, $ville, $codepostal, $etat, $adresseComplementaire, $date));

                                $reqRDV = $db->prepare("insert into rendezvous(idUtilisateur, idEntreprise, idAgent, intitulerdv,daterdv, heurerdv, consigne,priorite,dateRecep) values(?,?,?,?,?,?,?,?,?)");
                                $reqRDV ->execute(array($idEntrepriseUtilisateur, $afficheLastEntreprise['id'], $agentCommercial, $intituleRDV,$dateRDV, $heureRDV, $consigneRDV,$priorite, $date));

                                $reqCorrespondantEntreprise = $db->prepare("insert into correspondant (idUtilisateur,idEntreprise,posteCorrespondant,nomCorrespndant,emailCorrespondant,telephoneCorrespondant,dateRecep) values (?,?,?,?,?,?,?)");
                                $reqCorrespondantEntreprise->execute(array($idEntrepriseUtilisateur, $afficheLastEntreprise['id'], $posteCorrespondant, $nomCorrespondant, $emailCorrespondant, $telephoneCorrespondant, $date));


                            }else{
                                echo "<p class='alert-warning'>Vous devez choisir une heure ultérieure</p>";

                            }

                        }else{
                            echo "<p class='alert-warning'>Vous devez choisir une date ultérieure</p>";
                        }


                    }else{
                        echo "<p class='alert-warning'>Adresse Email du correspondant invalide</p>";
                    }

                }else{
                    echo "<p class='alert-warning'>Veuillez configurer correctement les paramètres du rendez-vous</p>";
                }

            }else{

                $lien ='rendez-vous.php?rdv_programmation='.$emailEntreprise;
                echo "<p class='alert-warning'>Ce contact éxiste déja dans le répertoire<br><a href='$lien'>Cliquer ici pour programmer un rendez-vous avec cette entreprise</a></p>";
            }

        }else{
            echo "<p class='alert-warning'>Adresse Email de l'entreprise invalide</p>";
        }


    }else{

        $idEntrepriseUtilisateur = htmlspecialchars($_GET['idEntrepriseUtilisateur']);
        $idCompteUtilisateur = htmlspecialchars($_GET['idCompteUtilisateur']);
        $nomEntreprise = htmlspecialchars($_GET['nomEntreprise']);
        $emailEntreprise = htmlspecialchars($_GET['emailEntreprise']);
        $telephoneEntreprise = htmlspecialchars($_GET['telephoneEntreprise']);
        $posteCorrespondant = htmlspecialchars($_GET['posteCorrespondant']);
        $nomCorrespondant = htmlspecialchars($_GET['nomCorrespondant']);
        $emailCorrespondant = htmlspecialchars($_GET['emailCorrespondant']);
        $telephoneCorrespondant = htmlspecialchars($_GET['telephoneCorrespondant']);
        $latitude = htmlspecialchars($_GET['latitude']);
        $longitude = htmlspecialchars($_GET['longitude']);
        $adresse = htmlspecialchars($_GET['adresse']);
        $pays = htmlspecialchars($_GET['pays']);
        $ville = htmlspecialchars($_GET['ville']);
        $etat = htmlspecialchars($_GET['etat']);
        $codepostal = htmlspecialchars($_GET['codepostal']);
        $adresseComplementaire = htmlspecialchars($_GET['adresseComplementaire']);

        if (filter_var($emailEntreprise,FILTER_VALIDATE_EMAIL) ){

            $reqExistenceEntreprise = $db->prepare("select * from entrepriserdv where idUtilisateur=? and emailEntreprise=? and etat='valide'");
            $reqExistenceEntreprise->execute(array($idEntrepriseUtilisateur, $emailEntreprise));
            $compteurExistenceEntreprise = $reqExistenceEntreprise->rowCount();

            if ($compteurExistenceEntreprise<1){



                                $reqEntrepriseRDV = $db->prepare("insert into entrepriserdv(idUtilisateur, idCompteInsertion,nomEntreprise,EmailEntreprise,telephoneEntreprise,dateRecep) values (?,?,?,?,?,?)");
                                $reqEntrepriseRDV->execute(array($idEntrepriseUtilisateur,$idCompteUtilisateur,$nomEntreprise,$emailEntreprise,$telephoneEntreprise,$date));

                                $reqLastEntreprise = $db->query("select * from entrepriserdv order by id desc limit 1");
                                $afficheLastEntreprise = $reqLastEntreprise->fetch();

                                $reqEntrepriseAdresse = $db->prepare("insert into entrepriseadresse (idEntreprise, adresse, latitude, longitude, pays, ville, codePostal, etatAdresse, adresseComplementaire, dateRecep ) values(?,?,?,?,?,?,?,?,?,?)");
                                $reqEntrepriseAdresse->execute(array($afficheLastEntreprise['id'], $adresse, $latitude, $longitude, $pays, $ville, $codepostal, $etat, $adresseComplementaire, $date));

                                $reqCorrespondantEntreprise = $db->prepare("insert into correspondant (idUtilisateur,idEntreprise,posteCorrespondant,nomCorrespndant,emailCorrespondant,telephoneCorrespondant,dateRecep) values (?,?,?,?,?,?,?)");
                                $reqCorrespondantEntreprise->execute(array($idEntrepriseUtilisateur, $afficheLastEntreprise['id'], $posteCorrespondant, $nomCorrespondant, $emailCorrespondant, $telephoneCorrespondant, $date));




            }else{

                $lien ='rendez-vous.php?rdv_programmation='.$emailEntreprise;
                echo "<p class='alert-warning'>Ce contact éxiste déja dans le répertoire<br><a href='$lien'>Cliquer ici pour programmer un rendez-vous avec cette entreprise</a></p>";
            }

        }else{
            echo "<p class='alert-warning'>Adresse Email de l'entreprise invalide</p>";
        }


    }

}
