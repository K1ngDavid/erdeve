$(document).ready(function () {

    window.onload = function recuperationrdv () {
        var proprietaire = $("#entreprise-identifiant").val();
        $.ajax({
            url:'js-rdv-data.php',
            type:'GET',
            data:'proprietaire='+proprietaire,
            success:function (data) {

            }
        })
    }
});