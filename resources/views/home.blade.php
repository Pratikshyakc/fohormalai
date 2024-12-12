<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fohor Malai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    FOHORMALAI!

</header>
<div class="container">
    <div class="left">

        <header>
            <p>Welcome to Fohor Malai: You can pin and locate garbage, which will notify your nearest municipality office. Let’s keep our environment clean.</p>
        </header>
        <div class="carousel">
            <button class="carousel-button" id="prev">&lt;</button>
            <div class="carousel-images">
                <img src="https://via.placeholder.com/100" alt="Image 1">
                <img src="https://via.placeholder.com/100" alt="Image 2">
                <img src="https://via.placeholder.com/100" alt="Image 3">
                <img src="https://via.placeholder.com/100" alt="Image 4">
            </div>
            <button class="carousel-button" id="next">&gt;</button>
        </div>
    </div>

    <div class="right">
        <form action="#" method="POST">
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <label for="location">Location Details:</label>
            <input type="text" id="location" name="location" placeholder="Enter location details">

            <label for="map">Map:</label>
            <div class="map-placeholder">Map will be integrated here</div>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" placeholder="Enter any remarks"></textarea>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
