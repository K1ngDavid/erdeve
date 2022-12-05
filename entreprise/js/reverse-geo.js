$(document).ready(function () {
    window.onload = function positon(){

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }

        function showPosition(position) {
            var Latitude = position.coords.latitude;
            var Longitutde = position.coords.longitude;

            $.ajax({
                url:'js-position.php',
                type:'GET',
                data:'latitude='+Latitude +'&longitude='+Longitutde,
                success:function (data) {
                    reverse_geo();
                }
            });
        }

    };

    function reverse_geo() {
        $.get('reverse-geo.json', function (data) {

            var url = data['src'];
            var latitude = data['latitude'];
            var longitude = data['longitude'];
            var entreprise = $("#entreprise-identifiant").val();

            fetch(url)
                .then(response => response.json())
                .then(responseData => {

                    var adresse= responseData.results[0].formatted_address;
                    $.ajax({
                        url:'js-coordonnee-admin.php',
                        type:'GET',
                        data:'adresse='+adresse +'&latitude='+latitude +'&longitude='+longitude +'&entreprise='+entreprise,
                        success:function(donnees){

                        }
                    })

                })
                .catch(err => console.warn(err.message))
        })
    }
});