
<?php

include '../env.php';

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    echo "Connection Failed";
}
?>