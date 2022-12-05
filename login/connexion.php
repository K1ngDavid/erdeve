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
                            <label for="inputUsernameEmail">Identifiant</label>
                            <input type="text" class="form-control" id="identifiantConnexion">
                        </div>
                        <div class="form-group">
                            <a href="#" class="pull-right label-forgot">Mot de passe oublie?</a>
                            <label for="mdpSecond">Mot de passe</label>
                            <input type="password" id="mdpConnexion" class="form-control">
                        </div>
                    </form>
                    <hr>
                    <br>
					<div class="message-connexion">

					</div>
                    <div class="row-block">
                        <div class="row">
                            <div class="col-md-12 row-block">
                                <button class="btn btn-primary btn-block" id="connexionButton">Se connecter</button>
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
