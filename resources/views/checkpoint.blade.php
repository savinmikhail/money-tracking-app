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
{{--    <tr>--}}
{{--        <td>Москва</td>--}}
{{--        <td>Купил сыр! Вкусный сыр!</td>--}}
{{--        <td><img src="../../public/images/photo1.png" alt="Photo 1"></td>--}}
{{--        <td>2023-01-10</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Санкт-Петербург</td>--}}
{{--        <td>Получил деньги! Отправляю привет!</td>--}}
{{--        <td><img src="https://cdn.iportal.ru/news/2017/preview/57c15eb6d0c72bfd42d28c3bb054967d04808432_1920.jpg" alt="Photo 2"></td>--}}
{{--        <td>2023-03-22</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Екатеринбург</td>--}}
{{--        <td>Расплатился этой купюрой в кафе. Все ок!</td>--}}
{{--        <td><img src="{{ asset('/public/images/photo1.png') }}" alt="Photo 3"></td>--}}
{{--        <td>2023-05-05</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Нижний Новгород</td>--}}
{{--        <td>Снял деньги в банкомате. Удачный день!</td>--}}
{{--        <td><img src="{{ asset('images/photo1.png') }}" alt="Photo 4"></td>--}}
{{--        <td>2023-07-18</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Казань</td>--}}
{{--        <td>Покупал подарки в магазине. Банкнота пришлась кстати!</td>--}}
{{--        <td><img src="{{ asset('storage/images/VWAhrzk2qOApn99oLTMrcCLHasIeQyZHFq2Awu06.png') }}" alt="Photo 5"></td>--}}
{{--        <td>2023-09-30</td>--}}
{{--    </tr>--}}
    @foreach($checkpoints as $key => $data)
    <tr>
        <td>{{ $data->longitude}}</td>
        <td>{{ $data->comment}}</td>
        <td><img src="{{ asset($data->image_path) }}" alt="Photo 5"></td>
        <td>{{ $data->created_at}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<style>
        #map {
            width: 70%;
            height: 400px;
            margin: 0 auto; /* Add this line to center the map horizontally */
            background-color: gray;
        }
        body {
            margin: 0;
        }
    </style>
</head>

<h3>Map</h3>
<div id="map"></div>
<script>
    function initMap() {
        // Map options
        var options = {
            zoom: 5,
            center: { lat: 56.50197789296781, lng: 84.94030339615674 },
        };

        // New map
        var map = new google.maps.Map(document.getElementById('map'), options);

        // Listener for clicks on map
        google.maps.event.addListener(map, 'click', function (event) {
            // Add marker
            addMarker({ coords: event.latLng });
        });

        // Array of markers
        var markers = [
                @foreach($checkpoints as $data)
            {
                coords: { lat: {{ $data->latitude }}, lng: {{ $data->longitude }} },
                content: '<p>{{ $data->comment }}</p>'
            },
            @endforeach
        ];

        // Loop through markers
        for (var i = 0; i < markers.length; i++) {
            // Add marker
            addMarker(markers[i]);
        }

        // Add marker function
        function addMarker(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,
            });

            if (props.content) {
                var infoWindow = new google.maps.InfoWindow({
                    content: props.content,
                });

                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });
            }

            marker.addListener('click', function () {
                var lat = this.getPosition().lat();
                var lng = this.getPosition().lng();


                ltdInput.value = lat;
                lngInput.value = lng;

                // console.log('Clicked Marker Latitude:', lat);
                // console.log('Clicked Marker Longitude:', lng);
            });
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwgkwTxgXlzvyCrgCVJ6Z-785Ocan9PiM
&callback=initMap"> </script>

</body>
</html>

<form method="POST" action="/checkpoint/{{ $banknote_id }}" enctype="multipart/form-data">

    @csrf

    <div class="container">
        <h1 class="status"></h1>

        <label for="lng">Longitude:</label>
        <input type="text" id="lng" name="lng"><br><br>

        <label for="ltd">Latitude:</label>
        <input type="text" id="ltd" name="ltd"><br><br>

        <button class="getCoords">Result</button>
    </div>
    <script>
        // Get references to the input elements
        const lngInput = document.querySelector('#lng');
        const ltdInput = document.querySelector('#ltd');

        // Success callback function for getCurrentPosition
        const success = (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Update the input values with latitude and longitude
            ltdInput.value = latitude;
            lngInput.value = longitude;
        };

        // Function to retrieve the geolocation
        const findMyState = (event) => {
            event.preventDefault(); // Prevent form submission and page reload

            const status = document.querySelector('.status');

            // Error callback function for getCurrentPosition
            const error = () => {
                status.textContent = 'Failed attempt';
            };

            // Get the current position and call the success or error callback
            navigator.geolocation.getCurrentPosition(success, error);
        };

        // Attach the click event listener to the "Result" button
        document.querySelector('.getCoords').addEventListener('click', findMyState);
    </script>
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

