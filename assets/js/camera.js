async function checkCameraPermission() {
    try {
        const permissionStatus = await navigator.permissions.query({ name: 'camera' });
        if (permissionStatus.state === 'granted') {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
        } else {
            alert("Camera permission is required. Please enable it.");
            location.reload(); // Reload the page
        }
    } catch (error) {
        alert("An error occurred while checking camera permissions.");
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
    canvas.width = 120;
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
