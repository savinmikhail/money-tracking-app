@extends('layout')

@section('content')

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
                <td><a href="checkpoint/{{ $data->id }}">{{ $data->serial_number }}</a></td>
                <td>{{ $data->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="container">
        <h3>Add Banknote</h3>
        <form action="{{ route('storeBanknote') }}" method="POST">
            @csrf

            <label>
                Serial Number:
                <input type="text" name="serial_number" placeholder="Serial Number" required />
            </label>

            <label>
                Price:
                <input type="text" name="price" placeholder="Price" required />
            </label>

            <button type="submit">Add Banknote</button>
        </form>
    </div>
    </body>

@endsection
