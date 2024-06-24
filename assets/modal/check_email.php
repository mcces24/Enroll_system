
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include_once "../../database/conn.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $requestData = json_decode(file_get_contents('php://input'), true);
    $email = $requestData['email'];
      
     $query = "SELECT email FROM student_acc WHERE email = ?";
     $stmt = $conn->prepare($query);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     
     if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         $existing_email = $row['email'];
         
         if ($existing_email == $email) {
            echo json_encode(['emailExists' => true]);
        } else {
            echo json_encode(['emailExists' => false]);
        }
     } else {
        echo json_encode(['emailExists' => false]);
     }
    }
?> 

