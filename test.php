<?php
$db_host = 'localhost';
$db_username = 'root'; // Your username
$db_password = ''; // Your password
$db_name = 'lodge_booking'; // Your database name

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$conn->close();
?>
