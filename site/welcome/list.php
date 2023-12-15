<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">
    
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
    <style>
        #map {
            border-radius: 10px;
            height: 40vw;
            width: 80vw;
        }
    </style>
</head>

<body>
    <?php

    include "../Elementi in comune/sfondo.html";
    include "../Elementi in comune/sidebar.php";

    ?>
        <div id="map"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([41.8933203, 12.4829321], 12); // Set the initial map center and zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

        // Load GeoJSON data
        fetch('map.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: {
                        fillColor: 'green',
                        weight: 1
                    },
                    onEachFeature: function (feature, layer) {
                        var properties = feature.properties;
                        var popupContent = "<strong>Comune:</strong> " + properties.Comune + "<br>" +
                            "<strong>Provincia:</strong> " + properties.Provincia + "<br>" +
                            "<strong>Regione:</strong> " + properties.Regione + "<br>" +
                            "<strong>Nome:</strong> " + properties.Nome + "<br>" +
                            "<strong>Anno inserimento:</strong> " + properties["Anno inserimento"] + "<br>" +
                            "<strong>Data e ora inserimento:</strong> " + properties["Data e ora inserimento"] + "<br>" +
                            "<strong>Identificatore in OpenStreetMap:</strong> " + properties["Identificatore in OpenStreetMap"];

                        layer.bindPopup(popupContent);
                    }
                }).addTo(map);
            });
    </script>
</body>

</html>