<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <style>
    .map {
        height: 200px;
        width: 400px;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
    <title>My Map </title>
</head>
<body>

    <?php
    include"koneksi.php";
    $sql = mysqli_query($kon,"select * from absen where userlogin = '1' order by id DESC limit 1"); 
    $data = mysqli_fetch_array($sql)
    ?>

    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">
    var map = new ol.Map({
        target: 'map',
        layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
        ],
        view: new ol.View({
        center: ol.proj.fromLonLat([<?= $data['longitude'];?>, <?= $data['latitude'];?>]),
        zoom: 15,
        maxZoom: 18,
        constrainOnlyCenter: true,
        })
    });
    </script>
</body>
</html>

