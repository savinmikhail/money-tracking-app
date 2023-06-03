@extends('layout')

@section('content')
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

    </style>
</head>
<body>


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

@endsection
