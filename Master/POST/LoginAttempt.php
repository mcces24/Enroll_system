<?php
function logLoginAttempt($conn, $email, $portal, $type, $location, $completeAddress, $lat, $lon) {
    date_default_timezone_set('America/New_York');
    $currentDateTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS
    $stmt = $conn->prepare("INSERT INTO login_logs (attemp, portal, type, location, com_location, lat, lon, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdds", $email, $portal, $type, $location, $completeAddress, $lat, $lon, $currentDateTime);
    $stmt->execute();
    $stmt->close();
}
?>
