
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
