function getLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                // console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

                // Optionally send the location to your server
                document.cookie = `latitude=${latitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
                document.cookie = `longitude=${longitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
            },
            (error) => {
                if (error.code === error.PERMISSION_DENIED) {
                    const allowLocation = confirm("Location access is required. Would you like to enable it?");
                    if (allowLocation) {
                        getLocation(); // Retry getting location
                    } else {
                        getLocation(); // Retry getting location
                    }
                } else {
                    getLocation(); // Retry getting location
                }
            }
        );
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}
