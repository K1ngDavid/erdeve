$(document).ready(function () {

    $("#inscriptionButton").click(function () {
        var souscription = $("select[name=forfait]").val();
        var nomEntreprise = $("#nomEntreprise").val();
        var activite = $("#activiteEntreprise").val();
        var email = $("#emailEntreprise").val();
        var mdpFirst = $("#mdpFirst").val();
        var mdpSecond = $("#mdpSecond").val();



        $.ajax({
            url:'js-inscription.php',
            type:'GET',
            data:'souscription='+souscription +'&nomEntreprise='+nomEntreprise +'&activite='+activite +'&email='+email +'&mdpFirst='+mdpFirst +'&mdpSecond='+mdpSecond,
            success:function (data) {
                if (data ===''){
                    window.location.href=("../create-checkout-session.php");
                }else {
                    $("#message-inscription").html(data);
                }
            }
        })
    });

    $("#afficheFormulaire").click(function () {
        $("#formulaireAgent").toggle();

    });

    $("#connexionButton").click(function () {
         var identifiant = $("#identifiantConnexion").val();
         var mdp = $("#mdpConnexion").val();

         $.ajax({
             url:'js-connexion.php',
             type:'GET',
             data:'id='+identifiant +'&mdp='+mdp,
             success:function (data) {
                if (data===''){
                    window.location.href=('../entreprise/dashboard.php');
                }else {
                    $("div.message-connexion").html(data);
                    setTimeout("$(\"div.message-connexion\").html('<p></p>')",5000);
                }
             }
         })
    });
});