<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Map</title>
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    #map{
        height: 100%;
        margin: 0;
    }
</style>

<script>
    alert('hi');
    var mapOptions = {
        center: new google.maps.LatLng(37.7831,-122.4039),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    new google.maps.Map(document.getElementById('map'), mapOptions);
</script>
<body>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyDuECh_YoiNk2yA38hAhUwHNfV1qs8fEIk"></script>
<div id="map"></div>
</body>
</html>