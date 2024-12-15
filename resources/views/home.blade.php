<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FohorMalai</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href=" https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href=" https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!-- Slick Carousel JS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href=" https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images//favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/site.webmanifest')}}">

</head>
<body>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-6 border-left">
            <header>
                <h1>
                    FOHORMALAI!
                </h1>
                <p>Welcome to FohorMalai: You can pin and locate garbage, which will notify your nearest municipality office. Let’s keep our environment clean.</p>
            </header>
            <div class="carousel">
                <div class="carousel-images">
                    <img class="image-carousel" src="{{asset('images/fohorphoto1.jpeg')}}" alt="Image 1" >
                </div>
                <div class="carousel-images">
                    <img class="image-carousel" src=p"{{asset('images/fohorphoto2.jpeg')}}" alt="Image 2">
                </div>
                <div class="carousel-images">
                    <img class="image-carousel" src="{{asset('images/fohorphoto3.jpeg')}}" alt="Image 3">
                </div>

            </div>
                <div>
                    <a href="{{route('garbage.map')}}" class="btn btn-primary">View Nearest Map</a>
                </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('garbage.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="image" name="image" accept="image/*" >
                            <p id="file-selected-message" style="margin-top: 10px; display: none; color: green;"></p>



                   <div id="image-uploaded" style="margin-top: 10px; display:none;">
                       <h3>Image Uploaded:</h3>
                    <img id="preview-img" src="" alt="Image Preview" style="max-width: 100%; height: auto;"></div>

                        <label for="map">Map:</label>
                        <div id="map" style="height: 180px;"></div>
                        <span id="coordinates" style="font-size: 12px">
                            Click on the map to get latitude and longitude.
                        </span>
                        @error('latitude')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror
                        @error('longitude')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror

                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        <br>
                        <label for="name">Name:</label>
                        <input type="text" id="user_name" name="user_name" value="{{old('user_name')}}" required>
                        @error('user_name')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror

                        <label for="phone">Phone:</label>
                        <input type="tel" id="user_phone" name="user_phone" value="{{old('user_phone')}}" required>
                        @error('user_phone')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror

                        <label for="address">Address:</label>
                        <input type="text" id="user_address" name="user_address" value="{{old('user_address')}}" required>
                        @error('user_address')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror

                        <label for="remarks">Remarks: (Optional)</label>
                        <textarea  id="remarks" name="remarks" rows="4" placeholder="Enter any remarks" > {{old('remarks')}}
                        </textarea>
                        @error('remarks')
                        <span class="text-danger" style="font-size: 12px;">{{$message}}</span>
                        @enderror

                        <button type="submit" class="submit-button">Submit</button>
                    </form>


                    <script>
                        let uploadedFile = null; // Variable to store the file

                        const fileInput = document.getElementById('image');
                        const fileSelectedMessage = document.getElementById('file-selected-message');

                        fileInput.addEventListener('change', () => {
                            if (fileInput.files.length > 0) {
                                uploadedFile = fileInput.files[0]; // Store the file in the variable
                                fileSelectedMessage.style.display = 'block'; // Show confirmation message
                                fileSelectedMessage.textContent = `File "${uploadedFile.name}" has been selected.`;
                            }
                        });

                        document.getElementById('upload-form').addEventListener('submit', (event) => {
                            event.preventDefault(); // Prevent default form submission
                            if (uploadedFile) {
                                alert(`Form submitted with file: ${uploadedFile.name}`);
                                // Perform any additional actions with the file (e.g., upload to server)
                            } else {
                                alert('No file selected!');
                            }
                        });
                    </script>


                </div>
            </div>

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    $('.carousel').slick({dots: true});
    // Handle the image upload and display the div
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
        const preview = document.getElementById('preview-img');
        const uploadedDiv = document.getElementById('image-uploaded');

        if (file) {
            const reader = new FileReader();

            // When the file is loaded, display the image in the preview div
            reader.onload = function(e) {
                preview.src = e.target.result;  // Set the image source to the file content
                uploadedDiv.style.display = 'block'; // Show the div
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        } else {
            uploadedDiv.style.display = 'none'; // Hide the div if no file is selected
        }
    });
    var map = L.map('map').setView([28.2096, 83.9856], 13);

    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.on('click', function(e) {
        var lat = e.latlng.lat.toFixed(6); // Latitude rounded to 6 decimal places
        var lng = e.latlng.lng.toFixed(6); // Longitude rounded to 6 decimal places

        // Update the coordinates display


        // Update the hidden input fields
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        // Optionally add a marker at the clicked location
        L.marker([lat, lng]).addTo(map)
            .bindPopup(`Lat: ${lat}, Lng: ${lng}`)
            .openPopup();
    });
</script>
<script>
navigator.geolocation.getCurrentPosition(function (position) {
const latitude = position.coords.latitude;
const longitude = position.coords.longitude;

// Send this data to the backend
fetch('/submit-location', {
method: 'POST',
headers: { 'Content-Type': 'application/json' },
body: JSON.stringify({ latitude, longitude })
});
});
</script>
</body>
</html>
