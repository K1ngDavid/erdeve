<?php
session_start();
include"../db.php";
if (!isset($_SESSION['nomUser'])){
    header("Location: ../index.php");
}

$reqTelepro = $db->query("select * from commercial order by nom asc");


?>

<!DOCTYPE html>
<html lang="fr">



<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Commercial |<?= $_SESSION['nomUser'] ?></title>

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

<input style="display: none" id="idEntreprise" value="<?= $_SESSION['idUser'] ?>" >

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
						Commercial
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
													<label for="nomCommercial">Nom </label>
													<input type="text" class="form-control" id="nomCommercial" placeholder="Nom">
												</div>
												<div class="mb-3 col-md-6">
													<label for="prenomCommercial">Pr??nom</label>
													<input type="text" class="form-control" id="prenomCommercial" placeholder="Pr??nom">
												</div>
											</div>
											<div class="mb-3">
												<label for="emailCommercial">Email</label>
												<input type="email" class="form-control" id="emailCommercial" placeholder="adresse@mail.com">
											</div>
											<div class="mb-3">
												<label for="telephoneCommercial">Telephone</label>
												<input type="tel" class="form-control" id="telephoneCommercial" placeholder="Telephone">
											</div>
											<div class="message-formulaire">

											</div>

											<button type="button" class="btn btn-primary" name="buttonCommercial">Enregistrer</button>
										</form>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table id="datatables-basic" class="table table-striped" style="width:100%">
									<thead>
									<tr>
										<th>ID</th>
										<th>Nom</th>
										<th>Identifiant</th>
										<th>Telephone</th>
										<th>Etat du compte</th>
										<th>Options</th>
									</tr>
									</thead>
									<tbody>
                                    <?php
                                    $i = 1;
                                    while($afficheTelepro = $reqTelepro->fetch()){
                                        ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $afficheTelepro['nom'].' '.$afficheTelepro['prenom'] ?></td>
											<td><?= $afficheTelepro['emailConnexion'] ?></td>
											<td><?= $afficheTelepro['telephone'] ?></td>
                                            <?php
                                            if ($afficheTelepro['etat'] == 'valide'){
                                                ?>
												<td><a class="alert-success">Activ??</a></td>
                                                <?php
                                            }else{
                                                ?>
												<td><a class="alert-danger">D??sactiv??</a></td>
                                                <?php
                                            }
                                            ?>

											<td>
												<a>Renitialiser le mot de passe</a><br>
												<a>Discussion</a><br>
                                                <?php
                                                if ($afficheTelepro['etat'] == 'valide'){
                                                    ?>
													<a>D??sactiv?? le compte</a>
                                                    <?php
                                                }else{
                                                    ?>

													<a>Activ?? le compte</a>
                                                    <?php
                                                }
                                                ?>

											</td>
										</tr>
                                        <?php

                                    }
                                    ?>
									</tbody>
									<tfoot>
									<tr>
										<th>Nom</th>
										<th>Identifiant</th>
										<th>Telephone</th>
										<th>Etat du compte</th>
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