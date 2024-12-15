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
    const map = L.map('map').setView([27.7172, 85.3240], 12); // Default center

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Garbage data passed from Laravel
    const garbages = @json($garbages);

    // Add markers
    garbages.forEach(garbage => {
        const marker = L.marker([garbage.latitude, garbage.longitude]).addTo(map);
        marker.bindPopup(`
                <strong>${garbage.name}</strong><br>
                <img src="/${garbage.image}" class="popup-img" alt="Garbage Image">
            `);
    });
</script>
{{$garbages->where('id' , 5)->first()->getFirstMediaUrl('image')}}

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var locations = [
        {
            name: "Srijana Chowk",
            lat: 28.2114,
            lon: 83.9857,
            img: "https://via.placeholder.com/200?text=Srijana+Chowk"
        },
        {
            name: "Lakeside",
            lat: 28.2119,
            lon: 83.9581,
            img: "https://via.placeholder.com/200?text=Lakeside"
        },
        {
            name: "Bindhyabasini Temple",
            lat: 28.2416,
            lon: 83.9956,
            img: "https://via.placeholder.com/200?text=Bindhyabasini+Temple"
        },
        {
            name: "Mahendra Cave",
            lat: 28.2652,
            lon: 84.0006,
            img: "https://via.placeholder.com/200?text=Mahendra+Cave"
        }
    ];

    // Initialize the map and set its view to the first location
    var map = L.map('map').setView([locations[0].lat, locations[0].lon], 13);

    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Add markers with images in popups
    locations.forEach(function(location) {
        L.marker([location.lat, location.lon])
            .addTo(map)
            .bindPopup(`
                    <div>
                        <strong>${location.name}</strong>
                        <br>
                        <img src="${location.img}" alt="${location.name}" class="popup-image">
                    </div>
                `);
    });
</script>
</body>
</html>
