<?php
session_start();
include "../db.php";

if (!isset($_SESSION['nomUser'])){
    header("Location: ../index.php");
}


$reqCommercial = $db->prepare("select * from commercial where idEntreprise=? and etat='valide' order by nom asc");
$reqCommercial->execute(array($_SESSION['idUser']));

$reqContact = $db->prepare("select * from entrepriserdv where idUtilisateur=? and etat<>'supprimer' order by nomEntreprise asc");
$reqContact->execute(array($_SESSION['idUser']));

$reqRDV = $db->prepare("select * from rendezvous where idUtilisateur=? order by daterdv asc");
$reqRDV->execute(array($_SESSION['idUser']));



?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rendez-vous |<?= $_SESSION['nomUser'] ?></title>

    <!-- PICK ONE OF THE STYLES BELOW -->
    <!-- <link href="css/modern.css" rel="stylesheet"> -->
    <!-- <link href="css/classic.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- You can remove this after picking a style -->
    <style>
        body {
            opacity: 0;
        }
    </style>
    <script src="js/settings.js"></script>
    <!-- END SETTINGS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120946860-7');
    </script></head>

<body>
<div class="splash active">
    <div class="splash-icon"></div>
</div>
<input type="text" value="<?= $_SESSION['idUser'] ?>" id="entreprise-identifiant" style="display:none">
<input type="text" value="admin_<?= $_SESSION['idUser'] ?>" id= "idUtilisateur" style="display:none">

<div class="wrapper">
    <?php
    include"inc/navbar.php";
    ?>
    <div class="main">
        <?php
        include"inc/header.php";
        ?>
        <main class="content">
            <div class="container-fluid">

                <div class="header">
                    <h1 class="header-title">
                        Rendez-vous
                    </h1>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Liste</h5>
                                <!--
                                <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table.</h6>
                                -->
                            </div>
                            <div align="center">
                                <input type="button" class="btn btn-pill btn-primary" name="boutonAffichage" value="Ajouter" >
                            </div>
                            <div class="col-md-12" style="display: none" id="formulaireCreation">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Formulaire</h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="inputEmail4">Agent Commercial </label>
                                                    <select class="form-control" id="idCommercial">
                                                        <option value="">--Selectionner un agent--</option>
														<?php
														while($afficheComercial = $reqCommercial->fetch()){
															?>
															<option value="<?=$afficheComercial['id'] ?>"><?= $afficheComercial['nom'].' '.$afficheComercial['prenom'] ?></option>
														<?php
														}
														?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="inputPassword4">Entreprise</label>
													<select class="form-control" id="idContact">
														<option value="">--Selectionner une entreprise--</option>
                                                        <?php
                                                        while($afficheContact = $reqContact->fetch()){
                                                            ?>
															<option value="<?=$afficheContact['id'] ?>"><?= $afficheContact['nomEntreprise']?></option>
                                                            <?php
                                                        }
                                                        ?>
													</select>
                                                </div>
                                            </div>
											<div class="row">
												<div class="mb-3 col-md-6">
													<label>Date du rendez-vous</label>
													<input type="date" class="form-control" id="dateRDV">
												</div>
												<div class="mb-3 col-md-6">
													<label>Heure du rendez-vous</label>
													<input type="time" class="form-control" id="heureRDV">
												</div>
											</div>
											<div class="row">
												<div class="mb-3 col-md-6">
													<label>Intitulé du RDV</label>
													<input type="text" class="form-control" id="intituleRDV" placeholder="Meeting,prospection,...">
												</div>
												<div class="mb-3 col-md-6">
													<label>Priotité</label>
													<select class="form-control" id="priorite">
														<option value="1">Niveau 1</option>
														<option value="2">Niveau 2</option>
														<option value="3">Niveau 3</option>
													</select>
												</div>
											</div>
											<div class="mb-3">
												<textarea class="form-control" id="consigneRDV">Consignes</textarea>
											</div><br>
                                            <div class="message-formulaire">

                                            </div>
                                            <button type="button" name="boutton-rdv" class="btn btn-primary">Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatables-basic" class="table table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Entreprise</th>
                                        <th>Coordonnées de l'entreprise</th>
                                        <th>Pris en charge par</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Date du RDV</th>
                                        <th>Etat</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    while($afficheRDV = $reqRDV->fetch()){
                                        $reqEntreprise = $db->prepare("select * from entrepriserdv where id=?");
                                        $reqEntreprise->execute(array($afficheRDV['idEntreprise']));
                                        $afficheCoordEntreprise = $reqEntreprise->fetch();

                                        $reqCoordCommercial = $db->prepare("select * from commercial where id=?");
                                        $reqCoordCommercial->execute(array($afficheRDV['idAgent']));
                                        $afficheCoordCommercial = $reqCoordCommercial->fetch();

                                        ?>
                                        <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?=$afficheCoordEntreprise['nomEntreprise']?></td>
                                            <td>
                                                <?='E-mil: '.$afficheCoordEntreprise['emailEntreprise'] ?><br>
                                                <?='Téléphone: '.$afficheCoordEntreprise['telephoneEntreprise'] ?>
                                            </td>
                                            <td><?=$afficheCoordCommercial['nom'].' '.$afficheCoordCommercial['prenom'] ?></td>
                                            <td><?= $afficheRDV['dateRecep'] ?></td>
                                            <td>
												<?= 'Prévue pour le: '.$afficheRDV['daterdv'] ?><br>
                                                <?= 'à: '.$afficheRDV['heurerdv'] ?>
											</td>
                                            <td>
												En attente
											</td>
                                            <td>
                                                <i class="fa fa-tasks"></i>Reporter<br>
                                                <i class="fa fa-shapes"></i>Annuler<br>
                                                <i class="fa fa-edit"></i>Modifier<br>
												<i class="fa fa-recycle"></i>Archiver<br>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Entreprise</th>
                                        <th>Coordonnées de l'entreprise</th>
                                        <th>Pris en charge par</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Date du RDV</th>
                                        <th>Etat</th>
                                        <th>Options</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        <?php
        include"inc/footer.php";
        ?>
    </div>

</div>

<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path
                d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>
<script src="js/app.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables basic
        $('#datatables-basic').DataTable({
            responsive: true
        });
        // Datatables with Buttons
        var datatablesButtons = $('#datatables-buttons').DataTable({
            lengthChange: !1,
            buttons: ["copy", "print"],
            responsive: true
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
    });
</script>

<script src="js/projs.js"></script>
</body>


</html>