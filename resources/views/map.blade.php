<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map with Multiple Pins</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 500px; /* Define the height of your map container */
            width: 100%;  /* Full width */
        }

        .popup-image {
            max-width: 200px; /* Set the max width for the popup image */
            border-radius: 8px;
        }
    </style>
</head>
<body>
<h1>Garbage Points Map</h1>
<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Inject garbages data from the Laravel backend
    const garbages = @json($garbages);

    // Initialize the map and set its default view
    var map = L.map('map').setView([27.7172, 85.3240], 12);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Loop through the garbages and add markers dynamically
    garbages.forEach(function(garbage) {
        const latitude = parseFloat(garbage.latitude);
        const longitude = parseFloat(garbage.longitude);
        const imageUrl = garbage.image ? `${garbage.image}` : 'https://via.placeholder.com/200?text=No+Image';

        // Validate the latitude and longitude before adding the marker
        if (!isNaN(latitude) && !isNaN(longitude)) {
            L.marker([latitude, longitude])
                .addTo(map)
                .bindPopup(`
                    <div>
                        <strong>${latitude}, ${longitude}</strong><br>
                        <img src="${imageUrl}"  class="popup-image">
                    </div>
                `);
        } else {
            console.warn("Invalid coordinates for:", garbage);
        }
    });
</script>

</body>
</html>
