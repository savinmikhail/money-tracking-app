<!DOCTYPE html>
<html>
<head>
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
<body>
    <h3>Map</h3>
    <div id="map"></div>
    <script>
        function initMap(){
            //map options
            var options = {
                zoom: 5,
                center: {lat:56.50197789296781, lng: 84.94030339615674}
            }

            //new map
            var map = new
                google.maps.Map(document.getElementById('map'), options);

            //listener for clicks on map
            google.maps.event.addListener(map, 'click',
                function (event){
                //add marker
                addMarker({coords:event.latLng})
            });
            //array of markers
            var markers = [
                {
                    coords: {lat:56.50197789296781, lng: 85},
                    content: '<h3>Tomsk</h3><p>Купил сыр</p>'
                },
                {
                    coords: {lat:57.50197789296781, lng: 87},
                    content: '<h3>nsk</h3><p>Купил билет </p>'
                }
            ];

            //loop through markers
            for(var i = 0; i < markers.length; i++){
                //add marker
                addMarker(markers[i]);
            }

            //add marker function
            function addMarker(props) {
                var marker = new google.maps.Marker({
                    position: props.coords,
                    map: map
                });

                if (props.content) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: props.content
                    });

                    marker.addListener('click', function () {
                        infoWindow.open(map, marker);
                    });
                }
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwgkwTxgXlzvyCrgCVJ6Z-785Ocan9PiM
&callback=initMap"> </script>

</body>
</html>

