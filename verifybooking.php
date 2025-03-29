<?php
// Database configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'keeneguestlodge';

// Connect to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $surname = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Prepare SQL query to find the user
    $stmt = $conn->prepare("SELECT * FROM guestregistration WHERE name = ? AND surname = ? AND email = ?");
    $stmt->bind_param("sss", $name, $surname, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found in the database, fetch booking details
        $row = $result->fetch_assoc();

        // Redirect to receipt page with booking details
        header("Location: receipt.php?name=" . urlencode($row['name']) . "&surname=" . urlencode($row['surname']) . "&roomtype=" . urlencode($row['roomtype']) . "&numberofrooms=" . urlencode($row['numberofrooms']) . "&numberofguests=" . urlencode($row['numberofguests']) . "&totalPrice=" . urlencode($row['totalPrice']) . "&checkin=" . urldecode($row['checkin']) . "&checkout=" . urldecode($row['checkout']));
        exit();
    } else {
        // User not found, display an error message
        echo "<p style='color:red;'>No booking found with the provided details. Please check your information.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
