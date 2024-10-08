document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
});

document.addEventListener('keydown', function(event) {
    if (event.key === 'F12' || (event.ctrlKey && event.shiftKey && event.key === 'I')) {
        event.preventDefault();
    }
});

document.addEventListener('keydown', function(event) {
    if (event.ctrlKey && event.shiftKey && event.key === 'I') {
        event.preventDefault();
    }
});

var isDevToolsOpen = false;

function detectDevTools() {
    var startTime = new Date();
    debugger;  // This causes a pause if DevTools is open
    var endTime = new Date();

    if (endTime - startTime > 100) {  // Long pause means DevTools is open
        isDevToolsOpen = true;
        alert("DevTools are open! The page will reload.");
        window.location.reload();  // Reload the page
    } else {
        isDevToolsOpen = false;
    }
}

setInterval(function() {
    detectDevTools();
}, 1000);  // Check every second

function checkLocationAccess() {
    navigator.permissions.query({ name: 'geolocation' }).then((permissionStatus) => {
        if (permissionStatus.state === 'granted') {
            getLocation(); // If granted, get the location
        } else if (permissionStatus.state === 'prompt') {
            getLocation(); // If prompt, attempt to get location
        } else {
            // If denied, refresh the page
            alert("Location access is required. Please enable location access in your browser settings.");
            location.reload(); // Refresh the page
        }

        // Listen for changes in permission status
        permissionStatus.onchange = function() {
            if (this.state === 'granted') {
                getLocation(); // If access is granted later, get the location
            }
        };
    });
}

function getLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const accuracy = position.coords.accuracy; // Accuracy in meters

                // console.log(`Latitude: ${latitude}, Longitude: ${longitude}, Accuracy: ${accuracy} meters`);

                // Optionally send the location to your server
                document.cookie = `latitude=${latitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
                document.cookie = `longitude=${longitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
                document.cookie = `accuracy=${accuracy}; path=/; max-age=3600`; // Cookie expires in 1 hour
            },
            (error) => {
                if (error.code === error.PERMISSION_DENIED) {
                    alert("Location access is required. Please enable location access in your browser settings.");
                    location.reload(); // Refresh the page if permission is denied
                } else {
                    alert("Unable to retrieve location. Please try again.");
                }
            },
            { // Correctly place the options object here
                enableHighAccuracy: true, // Request higher accuracy
                timeout: 5000, // Wait for 5 seconds
                maximumAge: 0 // Do not use cached location
            }
        );
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

// Start by checking location access
checkLocationAccess();
