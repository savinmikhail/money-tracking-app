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
        <td><img src="../images/photo1.png" alt="Photo 1"></td>
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
        <td><img src="{{ asset('/resources/images/photo1.png') }}" alt="Photo 3"></td>
        <td>2023-05-05</td>
    </tr>
    <tr>
        <td>Нижний Новгород</td>
        <td>Снял деньги в банкомате. Удачный день!</td>
        <td><img src="{{ asset('images/img1.png') }}" alt="Photo 4"></td>
        <td>2023-07-18</td>
    </tr>
    <tr>
        <td>Казань</td>
        <td>Покупал подарки в магазине. Банкнота пришлась кстати!</td>
        <td><img src="https://yandex.ru/images/search?from=tabbar&img_url=https%3A%2F%2Fretailworldmagazine.com.au%2Fwp-content%2Fuploads%2F2020%2F10%2Fshutterstock_280286561-scaled.jpg&lr=102694&p=1&pos=6&rpt=simage&text=shopping%20with%20banknote" alt="Photo 5"></td>
        <td>2023-09-30</td>
    </tr>
    </tbody>
</table>
</body>
</html>
