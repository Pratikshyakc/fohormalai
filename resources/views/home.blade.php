<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fohormalai</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            gap: 20px;
        }

        .left-section, .right-section {
            flex: 1;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            border-bottom: 30px;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #333;
            background-color: #218838;
            border-radius: 2rem;
            background-size: 50px;
        }

        .image-carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }

        .carousel-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 1.5rem;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .carousel-btn:hover {
            background-color: #0056b3;
        }

        .carousel-images {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px;
        }

        .image-box {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            border-radius: 10px;
        }

        .right-section {
            padding: 10px;
        }

        form card{
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form label {
            font-weight: bold;
        }

        form input, form textarea, form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Left Section -->
    <div class="left-section">
        <header>
            <h1>Fohormalai</h1>
            <p>Welcome to Fohor Malai:</p>
            <p>You can pin and locate garbage, which will notify your nearest municipality office. Let's keep our environment clean.</p>
        </header>

        <div class="image-carousel">
            <button class="carousel-btn">&#8249;</button>
            <div class="carousel-images">
                <div class="image-box"></div>
                <div class="image-box"></div>
                <div class="image-box"></div>
                <div class="image-box"></div>
            </div>
            <button class="carousel-btn">&#8250;</button>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <form action="{{route('garbage.store')}}" method="POST" class="form">
            @csrf()
            <label for="image">Image</label>
            <input type="file" id="image" name="image">

            <label for="location">Location Detail</label>
            <input type="text" id="location" name="location" placeholder="Enter location details">

            <label for="name">Name *</label>
            <input type="text" id="name" name="user_name" placeholder="Enter your name" required>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="user_phone" placeholder="Enter your phone number">

            <label for="address">Address</label>
            <input type="text" id="address" name="user_address" placeholder="Enter your address">

            <label for="remarks">Remarks</label>
            <textarea id="remarks" name="remarks" rows="3" placeholder="Enter remarks"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
