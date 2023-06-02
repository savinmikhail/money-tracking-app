<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="status"></h1>

        <label for="lng">Longitude:</label>
        <input type="text" id="lng" name="lng"><br><br>

        <label for="ltd">Latitude:</label>
        <input type="text" id="ltd" name="ltd"><br><br>
{{--        <h3 class="lng"></h3>--}}
{{--        <h3 class="ltd"></h3>--}}
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
        const findMyState = () => {
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
</body>
</html>
