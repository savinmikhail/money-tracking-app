<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple and Beautiful Table</title>
    <style>
        /* CSS styles for the table */
        table {
            width: 500px;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            table-layout: fixed; /* Add this line for fixed table layout */
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }
        header {
            background-color: #333;
            padding: 10px;
            color: #fff;
            display: flex;
            justify-content: flex-end;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        header a:hover {
            text-decoration: underline;
        }
        input[type="text"],
        input[type="password"] {
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
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <a href="#">My Cart</a>
    <a href="#">My Profile</a>
    <!-- Add more navigation links as needed -->
</header>

<h1>My banknotes</h1>
<table>
    <thead>
    <tr>
        <th>Serial Number</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($banknotes as $key => $data)
    <tr>
        <td><a href="checkpoint/{{ $data->id}}">{{ $data->serial_number}}</a></td>
        <td>{{ $data->price}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{{--    --}}{{--        <form method="POST" action="{{ route('banknote') }}">--}}
<div class="container">
    <h3>Banknote</h3>
    <form action="{{ route('storeBanknote') }}" method="POST">
        @csrf

        <label>
            <input type="text" name="serial_number" placeholder="serial_number" required />
        </label>

        <label>
            <input type="text" name="price" placeholder="price" required />
        </label>

        <button type="submit">Add banknote</button>
    </form>
</div>
</body>
</html>
