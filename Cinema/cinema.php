<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link rel="stylesheet" href="../../Common_elements/background.css">
    <link rel="stylesheet" href="../../Common_elements/sidebar.css">

    <link rel="stylesheet" href="./cinema.css">

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../../Common_elements/controllo_accesso.php";
    include "../../Common_elements/background.html";
    include "../../Common_elements/sidebar.php";

    ?>
    <div class="contenitore">
        <h1>Cerca i cinema vicino a te</h1>
        <div id="map"></div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map', { doubleClickZoom: false }).locate({ setView: true, maxZoom: 16 });

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