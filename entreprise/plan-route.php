
<script>

    fetch("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyBSef9Ev3J-afhMZhVolYkntZkNLOWVlXI")
        .then(function(response) {
            var data = response
                $.ajax({
                url:'test.ph',
                type:'GET',
                data:'data='+data,
                success:function (data) {

                }
            })
        })
        .catch(function(error) {
            console.log('Looks like there was a problem: \n', error);
        });
</script>