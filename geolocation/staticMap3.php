<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="moment.js"></script>
    <!--    <script src="http://maps.googleapis.com/maps/api/js"></script>-->


    <script type="text/javascript">
        window.onload = function () {
            var latitude = 38.89773;
            var longitude = -77.036531;
            var latlong = latitude + ',' + longitude;
//            var mapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlong
//             + '&zoom=15&size=600x500&maptype=hybrid';
            var mapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlong + "&zoom=17&size=600x500&maptype=roadmap&&key=AIzaSyDuECh_YoiNk2yA38hAhUwHNfV1qs8fEIk";

            alert(mapUrl);
            document.getElementById('staticmap').innerHTML = "<img src='" + mapUrl + "'>";
        }

    </script>

</head>
<body>
<div id="staticmap" style="width: 600px;height: 500px"></div>

</body>
</html>