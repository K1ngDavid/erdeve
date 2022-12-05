$(document).ready(function () {


;

    $("input[name=boutonAffichage]").click(function () {
            $("#formulaireCreation").toggle();
    });

    $("button[name=buttonTelepro]").click(function () {

        var nom = $("#nomTelepro").val();
        var prenom = $("#prenomTelepro").val();
        var email = $("#emailTelepro").val();
        var idEntreprise = $("#idEntreprise").val();
        var telephone = $("#telephoneTelepro").val();

        $.ajax({
            url:'js-telepro.php',
            type:'GET',
            data:'nom='+nom +'&prenom='+prenom +'&email='+email +'&telephone='+telephone +'&entreprise='+idEntreprise,
            success:function (data) {
                if (data===''){
                    $("div.message-formulaire").html('<p></p>');
                    window.location.href=('telepro.php');
                }else {
                    $("div.message-formulaire").html(data);
                    setTimeout("$(\"div.message-formulaire\").html('<p></p>')",5000);
                }
            }
        })
    });

    $("button[name=buttonCommercial]").click(function () {

        var nom = $("#nomCommercial").val();
        var prenom = $("#prenomCommercial").val();
        var email = $("#emailCommercial").val();
        var idEntreprise = $("#idEntreprise").val();
        var telephone = $("#telephoneTelepro").val();

        $.ajax({
            url:'js-commercial.php',
            type:'GET',
            data:'nom='+nom +'&prenom='+prenom +'&email='+email +'&telephone='+telephone +'&entreprise='+idEntreprise,
            success:function (data) {
                if (data===''){
                    $("div.message-formulaire").html('<p></p>');
                    window.location.href=('commercial.php');
                }else {
                    $("div.message-formulaire").html(data);
                    setTimeout("$(\"div.message-formulaire\").html('<p></p>')",5000);
                }
            }
        })
    });

    $("#rdvTard").click(function () {
        if ($(this).is(":checked")){
            $("#rdvFormulaire").hide();
        }
    });

    $("#rdvMaintenant").click(function () {
        if ($(this).is(":checked")){
            $("#rdvFormulaire").show();
        }
    });

    $("button[name=buttonContact]").click(function () {

        var nomEntreprise = $("#nomEntreprise").val();
        var emailEntreprise = $("#emailEntreprise").val();
        var telephoneEntreprise = $("#telephoneEntreprise").val();
        var posteCorrespondant = $("#fonctionContact").val();
        var nomCorrespondant = $("#nomContact").val();
        var emailCorrespondant = $("#emailContact").val();
        var telephoneCorrespondant = $("#telephoneContact").val();
        var adresse = encodeURI($("#location").val());
        var optionAdresse = $("#adresseSuite").val();
        var ville = $("#locality").val();
        var etat = $("#administrative_area_level_1").val();
        var codepostal = $("#postal_code").val();
        var pays = $("#country").val();
        var adresseNoURI = $("#location").val();
        var idEntrepriseUtilisateur = $("#entreprise-identifiant").val();
        var idCompteUtilisateur = $("#idUtilisateur").val();

        var url='https://maps.googleapis.com/maps/api/geocode/json?address='+adresse+'&key=AIzaSyBSef9Ev3J-afhMZhVolYkntZkNLOWVlXI';

        if (adresse !='' && nomEntreprise!='' && emailEntreprise!='' && telephoneEntreprise!=''){
            fetch(url)
                .then(response => response.json())
                .then(responseData =>{
                    var latitude = responseData.results[0].geometry.location.lat;
                    var longitude = responseData.results[0].geometry.location.lng;
                    if($("#rdvMaintenant").is(":checked")){

                        var agentCommercial= $("#agentCommercial").val();
                        var dateRDV = $("#dateRDV").val();
                        var heureRDV = $("#heureRDV").val();
                        var consigneRDV= $("#consigneRDV").val();
                        var priorite= $("#priorite").val();
                        var intituleRDV = $("#intituleRDV").val();
                        var etatRDV ='maintenant';

                        if (agentCommercial!='' && dateRDV!='' && heureRDV!=''){

                            $("div.message-formulaire").html('<p></p>');

                            $.ajax({
                                url:'js-contact.php',
                                type:'GET',
                                data:'idCompteUtilisateur='+idCompteUtilisateur +'&idEntrepriseUtilisateur='+idEntrepriseUtilisateur +'&etatRDV='+etatRDV +'&nomEntreprise='+nomEntreprise +'&emailEntreprise='+emailEntreprise +'&telephoneEntreprise='+telephoneEntreprise
                                    +'&posteCorrespondant='+posteCorrespondant +'&nomCorrespondant='+nomCorrespondant +'&emailCorrespondant='+emailCorrespondant +'&telephoneCorrespondant='+telephoneCorrespondant
                                    +'&adresse='+adresseNoURI +'&pays='+pays +'&ville='+ville +'&etat='+etat +'&codepostal='+codepostal +'&adresseComplementaire='+optionAdresse +'&intituleRDV='+intituleRDV
                                    +'&agentCommercial='+agentCommercial +'&dateRDV='+dateRDV +'&heureRDV='+heureRDV +'&consigneRDV='+consigneRDV +'&latitude='+latitude +'&longitude='+longitude +'&priorite='+priorite,
                                success:function (responseAjax) {
                                    if (responseAjax ===''){
                                        window.location.href= ('contact.php');
                                    }else {
                                        $("div.message-formulaire").html(responseAjax);
                                        setTimeout("$('div.message-formulaire').html('<p></p>')",5000);
                                    }

                                }
                            })

                        }else {
                            $("div.message-formulaire").html('<p class="alert-warning">Veuillez configurer correctement les paramètres du rendez-vous</p>')

                        }

                    }else {
                        var etatRDV ='plustard';

                        $.ajax({
                            url:'js-contact.php',
                            type:'GET',
                            data:'idCompteUtilisateur='+idCompteUtilisateur +'&idEntrepriseUtilisateur='+idEntrepriseUtilisateur +'&etatRDV='+etatRDV +'&nomEntreprise='+nomEntreprise +'&emailEntreprise='+emailEntreprise +'&telephoneEntreprise='+telephoneEntreprise
                                +'&posteCorrespondant='+posteCorrespondant +'&nomCorrespondant='+nomCorrespondant +'&emailCorrespondant='+emailCorrespondant +'&telephoneCorrespondant='+telephoneCorrespondant
                                +'&adresse='+adresseNoURI +'&pays='+pays +'&ville='+ville +'&etat='+etat +'&codepostal='+codepostal +'&adresseComplementaire='+optionAdresse
                                +'&latitude='+latitude +'&longitude='+longitude,
                            success:function (responseAjax) {
                                if (responseAjax ===''){
                                    window.location.href= ('contact.php');
                                }else {
                                    $("div.message-formulaire").html(responseAjax);
                                    setTimeout("$('div.message-formulaire').html('<p></p>')",5000);
                                }

                            }
                        })

                    }
                })
                .catch(err => console.warn(err.message));

        }else{
            $("div.message-formulaire").html('<p class="alert-warning">Veuillez remplir correctement les champs obligatoires(*)</p>')
        }
    });

    $("button[name=boutton-rdv]").click(function () {
        var agentCommercial= $("#idCommercial").val();
        var entreprise= $("#idContact").val();
        var dateRDV = $("#dateRDV").val();
        var heureRDV = $("#heureRDV").val();
        var consigneRDV= $("#consigneRDV").val();
        var priorite= $("#priorite").val();
        var intituleRDV = $("#intituleRDV").val();
        var proprietaire= $("#entreprise-identifiant").val();

        $.ajax({
            url:'js-rdv.php',
            type:'GET',
            data:'idAgent='+agentCommercial +'&entreprise='+entreprise +'&dateRDV='+dateRDV +'&heureRDV='+heureRDV
            +'&consigneRDV='+consigneRDV +'&priorite='+priorite +'&proprietaire='+proprietaire +'&intituleRDV='+intituleRDV,
            success:function (data) {
                if (data===''){
                    window.location.href =('rendez-vous.php');
                }else {
                    $("div.message-formulaire").html(data);
                    setTimeout("$(\"div.message-formulaire\").html('<p></p>')",5000);
                }
            }
        })

    })

});