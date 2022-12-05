<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription | ERDEVE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

    <!--  <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/signin.css">






    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/minus.png">
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div class="container">



    <div class="" id="login-wrapper">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="logo-login">
                    <h1><a href="../index.php" title="Retourner à l'accueil">ERDEVE</a>
                        <span>v1.0</span>
                    </h1>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="account-box">

                    <form role="form">
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="inputUsernameEmail">Plan de souscription</label>
							<?php
							if(isset($_GET['months'])){
								if ($_GET['months'] == 1){
									?>
									<select class="form-control" id="forfait" name="forfait">
										<option value="1">1 Mois</option>
										<option value="3">3 Mois</option>
										<option value="12">12 Mois</option>
									</select>
									<?php

								}elseif($_GET['months'] == 3){
									?>
									<select class="form-control" id="forfait" name="forfait">
										<option value="3">3 Mois</option>
										<option value="12">12 Mois</option>
										<option value="1">1 Mois</option>
									</select>
									<?php

								}elseif ($_GET['months'] == 12){
									?>
									<select class="form-control" id="forfait" name="forfait">
										<option value="12">12 Mois</option>
										<option value="3">3 Mois</option>
										<option value="1">1 Mois</option>
									</select>
									<?php
								}else{
									?>
									<select class="form-control" id="forfait" name="forfait">
										<option value="12">12 Mois</option>
										<option value="3">3 Mois</option>
										<option value="1">1 Mois</option>
									</select>
							<?php
								}
								?>

								<?php
							}else{
								?>
								<select class="form-control" id="forfait" name="forfait">
									<option value="12">12 Mois</option>
									<option value="3">3 Mois</option>
									<option value="1">1 Mois</option>
								</select>
							<?php
							}
							?>

                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="nomEntreprise">Nom de l'entreprise</label>
                            <input type="text" id="nomEntreprise" class="form-control">
                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="activiteEntreprise">Secteurs d'activité</label>
                            <select id="activiteEntreprise" class="form-control">
                                <option value="1">Mines</option>
                                <option value="2">Energie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="emailEntreprise">Adresse Email </label>
                            <input type="text" id="emailEntreprise" class="form-control">
                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="mdpFirst">Mot de passe</label>
                            <input type="password" id="mdpFirst" class="form-control">
                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot"></a>
                            <label for="mdpSecond">Confirmer le mot de passe</label>
                            <input type="password" id="mdpSecond" class="form-control">
                        </div>
                    </form>

                    <hr>
                    <br>
                    <div id="message-inscription">

                    </div>
                    <div class="row-block">
                        <div class="row">
                            <div class="col-md-12 row-block">
                                <button class="btn btn-primary btn-block" id="inscriptionButton">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div style="text-align:center;margin:0 auto;">
        <h6 style="color:#fff;"> © 2021 ERDEVE - Tous droits réservés</h6>
    </div>

</div>
<div id="test1" class="gmap3"></div>



<!--  END OF PAPER WRAP -->



<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSwOxKFNK8GwjOcK9jxCLGpDwwtLRM9ZY&callback=initMap"></script>
<!-- MAIN EFFECT -->
<script type="text/javascript" src="assets/js/preloader.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/load.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/map/gmap3.js"></script>
<script type="text/javascript">
    $(function() {
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("test1"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
        }

    });
</script>
<script src="assets/js/projs.js"></script>



</body>

</html>
