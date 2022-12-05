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


?>


<!DOCTYPE html>
<html lang="fr">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contacts |<?= $_SESSION['nomUser'] ?></title>
	<link href="css/csspro.css" rel="stylesheet">
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
                        Contacts
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
												<div class="mb-3 col-md-4">
													<label for="nomEntreprise">Nom de l'entreprise*</label>
													<input type="text" class="form-control" id="nomEntreprise" placeholder="Nom de l'entreprise"><br>
													<label for="emailEntreprise">Email de l'entreprise*</label>
													<input type="email" class="form-control" id="emailEntreprise" placeholder="Adresse email de l'entreprise"><br>
													<label for="telephoneEntreprise">Téléphone de l' entreprise*</label>
													<input type="tel" class="form-control" id="telephoneEntreprise" placeholder="Telephone"><br>
													<label for="fonctionContact">Prise de contact avec </label>
													<select class="form-control" id="fonctionContact">
														<option value="">--Selectionner le poste--</option>
														<option value="dg">Directeur General</option>
														<option value="rc">Responsable commercial</option>
														<option value="rrh">Responsable RH</option>
														<option value="rt">Responsable technique</option>
														<option value="autres">Autres</option>
													</select><br>
													<label for="nomContact">Nom complet de l'agent</label>
													<input type="text" class="form-control" id="nomContact" placeholder="Nom et Prénom du contact"><br>
													<label for="emailContact">Email du correspondant</label>
													<input type="email" class="form-control" id="emailContact" placeholder="adresse@mail.com"><br>
													<label for="telephoneContact">Telephone du correspondant</label>
													<input type="tel" class="form-control" id="telephoneContact" placeholder="Telephone">

												</div>
												<div class="mb-3 col-md-4">
													<div class="card-container">
														<div class="panel">
															<div>
																<img class="sb-title-icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/location_pin/v5/24px.svg" alt="">
																<span class="sb-title">
																	Adresse selectionnée<br><br>
																	<p>Faites glisser Pegman de Google pour visiter l'entreprise en 3D</p>
																</span>
															</div>
															<input type="text" placeholder="Adresse *" id="location" class="form-control"/>
															<input type="text" id="adresseSuite" placeholder="Apt, Suite, etc (option)" class="form-control"/>
															<input type="text" placeholder="Ville" id="locality" class="form-control"/>
															<div class="half-input-container">
																<input type="text" class="half-input" placeholder="Etat/Province" id="administrative_area_level_1"/>
																<input type="text" class="half-input" placeholder="Code postal" id="postal_code"/>
															</div>
															<input type="text" placeholder="Pays" id="country" class="form-control"/>
														</div>
														<div class="map" id="map"></div>
													</div>
												</div>
												<div class="mb-3">
													<div align="center">
														<label for="rdvMaintenant">Plannifier le rdv maintenant</label>
														<input type="radio" name="planification"  id="rdvMaintenant" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label for="rdvTard">Plannifier le rdv plus tard</label>
														<input type="radio" name="planification" id="rdvTard">
													</div>
												</div>
												<div id="rdvFormulaire" class="row">
													<div class="mb-3">
														<label>Agent commercial</label>
														<select id="agentCommercial" class="form-control">
															<option>--Selectionner un commercial--</option>
															<?php
															while ($afficheComercial = $reqCommercial->fetch()){
																?>
																<option value="<?=$afficheComercial['id'] ?>"><?= $afficheComercial['nom'].' '.$afficheComercial['prenom'] ?></option>
															<?php
															}
															?>
														</select>
													</div>
													<div class="mb-3 col-md-6">
														<label>Date du rendez-vous</label>
														<input type="date" class="form-control" id="dateRDV">
													</div>
													<div class="mb-3 col-md-6">
														<label>Heure du rendez-vous</label>
														<input type="time" class="form-control" id="heureRDV">
													</div>
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
													<div class="mb-3">
														<textarea class="form-control" id="consigneRDV">Consignes</textarea>
													</div>
												</div>
											</div>
											<div class="message-formulaire" id="message-formulaire">

											</div>

											<button type="button" class="btn btn-primary" name="buttonContact">Enregistrer</button>
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
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Ajoute par</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
										$i = 1;
									while($afficheContact = $reqContact->fetch()){
										?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $afficheContact['nomEntreprise'] ?></td>
											<td><?= $afficheContact['emailEntreprise'] ?></td>
											<td><?= $afficheContact['telephoneEntreprise'] ?></td>

											<?php
											if (is_numeric($afficheContact['idCompteInsertion'])){
												$reqTelepro = $db->prepare("select * from telepro where id=?");
												$reqTelepro ->execute(array($afficheContact['idCompteInsertion']));
												$afficheTelepro = $reqTelepro->fetch();
												?>
												<td><?=$afficheTelepro['nom'] ?></td>
												<?php
											}else{
												?>
												<td>Administrateur Principal</td>
											<?php
											}
											?>
											<td class="alert-success">
												<i class="fa fa-eye"></i>Voir<br>
												<i class="fa fa-edit"></i>Modifier<br>
												<i class="fa fa-burn"></i>Archiver<br>
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
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Ajoute par</th>
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

<script>
    "use strict";

    function initMap() {
        const componentForm = [
            'location',
            'locality',
            'administrative_area_level_1',
            'country',
            'postal_code',
        ];
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 11,
            center: { lat: 37.4221, lng: -122.0841 },
            mapTypeControl: false,
            fullscreenControl: true,
            zoomControl: true,
            streetViewControl: true
        });
        const marker = new google.maps.Marker({map: map, draggable: false});
        const autocompleteInput = document.getElementById('location');
        const autocomplete = new google.maps.places.Autocomplete(autocompleteInput);
        autocomplete.addListener('place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert('Aucun details valide pour cet emplacement: \'' + place.name + '\'');
                return;
            }
            renderAddress(place);
            fillInAddress(place);
        });

        function fillInAddress(place) {  // optional parameter
            const addressNameFormat = {
                'street_number': 'short_name',
                'route': 'long_name',
                'locality': 'long_name',
                'administrative_area_level_1': 'short_name',
                'country': 'long_name',
                'postal_code': 'short_name',
            };
            const getAddressComp = function (type) {
                for (const component of place.address_components) {
                    if (component.types[0] === type) {
                        return component[addressNameFormat[type]];
                    }
                }
                return '';
            };
            document.getElementById('location').value = getAddressComp('street_number') + ' '
                + getAddressComp('route');
            for (const component of componentForm) {
                // Location field is handled separately above as it has different logic.
                if (component !== 'location') {
                    document.getElementById(component).value = getAddressComp(component);
                }
            }
        }

        function renderAddress(place) {
            map.setCenter(place.geometry.location);
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSef9Ev3J-afhMZhVolYkntZkNLOWVlXI&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cAB" async defer></script>

</body>


</html>