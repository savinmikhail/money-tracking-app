<!DOCTYPE html>
<html lang="en">
<head>
    <title>This Particular Banknote's Checkpoints</title>
    <style>
        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        /* CSS styles for the images */
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<h1>This Particular Banknote's Checkpoints</h1>
<table>
    <thead>
    <tr>
        <th>Location</th>
        <th>Comment</th>
        <th>Photo</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Москва</td>
        <td>Купил сыр! Вкусный сыр!</td>
        <td><img src="../../public/images/photo1.png" alt="Photo 1"></td>
        <td>2023-01-10</td>
    </tr>
    <tr>
        <td>Санкт-Петербург</td>
        <td>Получил деньги! Отправляю привет!</td>
        <td><img src="https://cdn.iportal.ru/news/2017/preview/57c15eb6d0c72bfd42d28c3bb054967d04808432_1920.jpg" alt="Photo 2"></td>
        <td>2023-03-22</td>
    </tr>
    <tr>
        <td>Екатеринбург</td>
        <td>Расплатился этой купюрой в кафе. Все ок!</td>
        <td><img src="{{ asset('/public/images/photo1.png') }}" alt="Photo 3"></td>
        <td>2023-05-05</td>
    </tr>
    <tr>
        <td>Нижний Новгород</td>
        <td>Снял деньги в банкомате. Удачный день!</td>
        <td><img src="{{ asset('images/photo1.png') }}" alt="Photo 4"></td>
        <td>2023-07-18</td>
    </tr>
    <tr>
        <td>Казань</td>
        <td>Покупал подарки в магазине. Банкнота пришлась кстати!</td>
        <td><img src="{{ asset('storage/images/VWAhrzk2qOApn99oLTMrcCLHasIeQyZHFq2Awu06.png') }}" alt="Photo 5"></td>
        <td>2023-09-30</td>
    </tr>
    @foreach($checkpoints as $key => $data)
    <tr>
        <td>{{ $data->location}}</td>
        <td>{{ $data->comment}}</td>
        <td><img src="{{ asset($data->image_path) }}" alt="Photo 5"></td>
        <td>{{ $data->created_at}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{{--<form method="POST" action="{{route('checkpointsStore')}}" enctype="multipart/form-data">--}}
{{--    <form method="POST" action="/checkpoint/{{route('getBanknoteId')}}" enctype="multipart/form-data">--}}
{{--        <form method="POST" action="/checkpoint/2" enctype="multipart/form-data">--}}
{{--@foreach($banknote_id as $id)--}}
<form method="POST" action="/checkpoint/{{ $banknote_id }}" enctype="multipart/form-data">
{{--    @endforeach--}}
    @csrf
{{--    <label for="banknote_id">Banknote id:</label>--}}
{{--    <input type="text" id="banknote_id" name="banknote_id"><br><br>--}}
    <label for="location">Location:</label>
         <input type="text" id="location" name="location"><br><br>
    <label for="comment">Comment:</label>
         <input type="text" id="comment" name="comment"><br><br>
    <label for="date">Date:</label>
         <input type="date" id="date" name="date"><br><br>
    <label for="photo">Upload Photo:</label>
        <input type="file" id="image" name="image"><br><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>

