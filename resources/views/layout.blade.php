<!DOCTYPE html>
<html lang="en">
<head>
    <title>Money-tracking</title>
    <!-- Add  CSS and other meta tags here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        /* Add the header style */
        header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }

        nav ul li a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            background-color: #ddd;
            border-radius: 4px;
        }

        nav ul li a:hover {
            background-color: #bbb;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 300px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 20px;

        }

        h1 {
            text-align: center;
            color: #333;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            table-layout: fixed; /* Add this line for fixed table layout */
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            width: 50%; /* Set the width to 50% for equal width columns */
        }

        th {
            background-color: #ffffff;
        }

        img {
            width: 100px;
            height: 100px;
        }


        .map {
            width: 70%;
            height: 400px;
            margin: 0 auto; /* Add this line to center the map horizontally */
            background-color: gray;
        }

        .container-wrapper {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
<div class="content-container">
    <!-- Add the header bar content here -->
    <header>
        <nav>
            <ul>
                <li><a href="/signin">Sign In</a></li>
                <li><a href="/signup">Sign Up</a></li>
                <li><a href="/logout">Sign Out</a></li>

                <li><a href="/home">Home</a></li>
                <!-- Add more menu items as needed -->
            </ul>
        </nav>
    </header>
</div>


<main>
    <!-- The main content of each page will be inserted here -->
    @yield('content')
</main>
{{--@stack('scripts')--}}
<!-- Add your JavaScript and other scripts here -->


