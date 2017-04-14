<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="moment.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>



    <script type="text/javascript">

        var watchId=null;

        function getPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successPosition);
            } else {
                document.getElementById('result').innerHTML = 'Browser not supported!'
            }
        }


        function watchPosition() {
            alert(1);
        }
            if (navigator.geolocation) {
                watchId=navigator.geolocation.watchPosition(successPosition,failurePosition,{
                    enableHighAccuracy:false,
                    timeout:3000,
                    maximumAge:4000
                });
            } else {
                document.getElementById('result').innerHTML = 'Browser not supported!'
            }
        }


        function failurePosition(error) {
        alert('Error code;' + error.code + "Error Msg:" + error.message );

            switch(error.code)

            {

                case PERMISSION_DENIED:

                    alert("User denied permission");

                    break;

                case TIMEOUT:

                    alert("Geolocation timed out");

                    break;

                case POSITION_UNAVAILABLE:

                    alert("Geolocation information is not available");

                    break;

                default:

                    alert("Unknown error");

                    break;
        }

        function successPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            var alti = position.coords.altitude;
            var altiAccuracy=position.coords.altitudeAccuracy ;
            var speed=position.coords.speed ;
            var accuracy=position.coords.accuracy;
            var direction=position.coords.heading;



            var dt=  moment(position.timestamp).format('LTS');


    document.getElementById('result').innerHTML =
        'Latitude:              ' + lat +
        '<br>longitude:         ' + long +
        "<br>Accuracy:          " + accuracy +
        '<br>Altitude:          ' + alti +
        "<br>Altitude Accuracy: " + altiAccuracy +
        "<br>Direction:         " + direction +
        "<br>Speed:             " + speed +
        "<br>TimeStamp:         " + dt;


        }

        function stopWatching(watchId) {
//            alert(watchId);

            if (typeof watchId ==='undefined' ){
                document.getElementById('result').innerHTML ='Stop Tracking';

            } else {
                navigator.geolocation.clearWatch(watchId);
            }


            watchId=null;
            location.reload();

        }

        function test() {
            alert('hi');
        }

    </script>
</head>
<body>
<div id="result"></div>
<button id="btnPosition" onclick="getPosition()">Get Current Position</button>
<button id="btnPosition" onclick="test()">Get Current Position</button>

<button id="btnStartTracking" onclick="watchPosition()">Start Tracking location</button>
<button id="btnStopTracking" onclick="stopWatching()">Stop tracking</button>

</body>
</html>