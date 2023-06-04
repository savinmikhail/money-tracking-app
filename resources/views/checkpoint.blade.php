@extends('layout')

@section('content')
<head>
    <style>
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 300px;
            /* Adjust the margin as needed */
            margin: 10px 10px 20px;
        }
    </style>
</head>
<body>
<h1>Checkpoints of banknote {{ $serial_number }}</h1>

<div id="map" class="map"></div>
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
                content: '<div><p>Comment: {{ $data->comment }}</p><p>Date: {{ $data->date }}</p><img src="{{ asset($data->image_path) }}" alt="Image"></div>'
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
                    maxWidth: 300,
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
            });
        }

        // Draw route through markers
        var waypoints = markers.map(function (marker) {
            return {
                location: marker.coords,
                stopover: true,
            };
        });

        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true, // Hide the default markers
        });

        var request = {
            origin: markers[0].coords,
            destination: markers[markers.length - 1].coords,
            waypoints: waypoints.slice(1, waypoints.length - 1), // Exclude the first and last markers as origin and destination
            optimizeWaypoints: true,
            travelMode: 'DRIVING',
        };

        directionsService.route(request, function (result, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(result);
            }
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwgkwTxgXlzvyCrgCVJ6Z-785Ocan9PiM&callback=initMap"> </script>
{{--use the next line with your actual api key--}}
{{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>--}}

</body>


<form method="POST" action="/checkpoint/{{ $banknote_id }}" enctype="multipart/form-data">

    @csrf
    <div class="container-wrapper">
        <div class="container">
            <h1 class="status"></h1>

            <!-- Longitude input -->
            <label for="lng">Longitude:</label>
            <input type="text" id="lng" name="lng"><br><br>

            <!-- Latitude input -->
            <label for="ltd">Latitude:</label>
            <input type="text" id="ltd" name="ltd"><br><br>

            <!-- Button to get current location -->
            <button class="getCoords">Get location</button>
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
                const getCoords = (event) => {
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
                document.querySelector('.getCoords').addEventListener('click', getCoords);
            </script>
{{--        @push('findGeo')--}}
{{--                 <script src="{{ asset('js/findGeo.js')}}"></script>--}}
{{--        @endpush--}}

        <div class="container">
            <!-- Comment input -->
            <label for="comment">Comment:</label>
            <input type="text" id="comment" name="comment"><br><br>

            <!-- Date input -->
            <label for="date">Date:</label>
            <input type="date" id="date" name="date"><br><br>

            <!-- Photo upload -->
            <label for="photo">Upload Photo:</label>
            <input type="file" id="image" name="image"><br><br>

            <!-- Submit button -->
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection
