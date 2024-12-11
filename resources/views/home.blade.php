<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoharMalai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: right;
            box-shadow: 0 4px 6px rgba(60, 12, 31, 0.065);
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .intro {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            gap: 20px;
        }

        .image-gallery {
            flex: 1;
            margin: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .image-gallery img {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .form-section {
            flex: 1;
            margin: 10px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-section input, .form-section textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-section button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-section button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
<header>
    <h1>FoharMalai</h1>
</header>

<div class="container">
    <div class="intro">
        <p>Welcome to FoharMalai! Please fill out the details below and explore the location information.</p>
    </div>

    <div class="main-content">
        <div class="image-gallery">
            <h3>Gallery</h3>
            <img src="\images\fohorphoto1.jpeg" alt="Description1">
            <img src="\images\fohorphoto2.jpeg" alt="Description2">
            <img src="\images\fohorphoto3.jpeg" alt="Description3">
        </div>

        <div class="form-section">
            <h3>Location Details</h3>
            <div>
                <label for="map">Map:</label>
                <div id="map" style="width: 100%; height: 200px; background-color: #eaeaea; border-radius: 8px;">Map Placeholder</div>
            </div>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter your address">

                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" placeholder="Enter any remarks" rows="4"></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 FoharMalai. All rights reserved.</p>
</footer>
</body>
</html>
