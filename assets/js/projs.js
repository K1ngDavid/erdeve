$(document).ready(function () {
    $("#sendNewsletter").click(function () {
        var emailClient = $("#emailNewslleter").val();

        $.ajax({
            url:'js-news.php',
            type:'GET',
            data:'email='+emailClient,
            success:function (data) {
                if (data===''){
                    $("#message-newsletter").html("<p class='alert-success'>Email envoyé avec succès</p>");
                    $("#formNews").trigger("reset");
                    setTimeout("$('#message-newsletter').hide()",4000);
                }else {
                    $("#message-newsletter").html(data);
                    setTimeout("$('#message-newsletter').hide()",4000);
                }
            }
        })
    });

    $("#sendContact").click(function () {
        var nom = $("#name").val();
        var email = $("#email").val();
        var sujet = $("#subject").val();
        var message = $("#message").val();

        $.ajax({
            url:'js-contact.php',
            type:'GET',
            data:'nom='+nom +'&email='+email +'&sujet='+sujet +'&message='+message,
            success:function (data) {
                if (data===''){
                    $("#message-contct").html(data);
                    $("#formContact").trigger("reset");
                    setTimeout('$("#message-contct").hide()',4000);
                }else {
                    $("#message-contct").html(data);
                    setTimeout('$("#message-contct").hide()',4000);
                }
            }
        })
    });

});