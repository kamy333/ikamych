<!DOCTYPE html>

<html>

<head>

    <title>Static Map</title>

    <script type="text/javascript">

        window.onload = function()

        {

            var latitude = 38.897733;

            var longitude = -77.036531;

            var latlong = latitude + "," + longitude;

            var mapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlong + "&zoom=20&size=300x300&maptype=satellite&&key=AIzaSyDuECh_YoiNk2yA38hAhUwHNfV1qs8fEIk";



            document.getElementById("staticmap").innerHTML = "<img src='" + mapUrl + "'>";

        }

    </script>

</head>

<body>

<div id="staticmap" style="width:300px;height:300px;"></div>

</body>

</html>