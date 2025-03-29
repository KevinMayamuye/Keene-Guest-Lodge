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
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phoneCode = isset($_POST['phoneCode']) ? htmlspecialchars($_POST['phoneCode']) : '';
    $phoneno = isset($_POST['phoneno']) ? htmlspecialchars($_POST['phoneno']) : '';
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $roomtype = isset($_POST['roomtype']) ? htmlspecialchars($_POST['roomtype']) : '';
    $numberofguests = intval(isset($_POST['numberofguests']) ? $_POST['numberofguests'] : '');
    $numberofrooms = intval(isset($_POST['numberofrooms']) ? $_POST['numberofrooms'] : '');
    $owner = isset($_POST['owner']) ? htmlspecialchars($_POST['owner']) : '';
    $cvv = isset($_POST['cvv']) ? htmlspecialchars($_POST['cvv']) : '';
    $cardNumber = isset($_POST['cardNumber']) ? htmlspecialchars($_POST['cardNumber']) : '';
    $exmonth = isset($_POST['exmonth']) ? htmlspecialchars($_POST['exmonth']) : '';
    $exyear = isset($_POST['exyear']) ? htmlspecialchars($_POST['exyear']) : '';
    $totalPrice = intval(isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO guestregistration(name, surname, gender, email, phoneCode, phoneno, checkin, checkout, roomtype, numberofguests, numberofrooms, owner, cvv, cardNumber, exmonth, exyear, totalPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssiisssiisiisii", $name, $surname, $gender, $email, $phoneCode, $phoneno, $checkin, $checkout, $roomtype, $numberofguests, $numberofrooms, $owner, $cvv, $cardNumber, $exmonth, $exyear, $totalPrice);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Return booking details as JSON
        echo json_encode([
            'success' => true,
            'data' => [
                'name' => $name,
                'surname' => $surname,
                'roomtype' => $roomtype,
                'numberofrooms' => $numberofrooms,
                'numberofguests' => $numberofguests,
                'totalPrice' => $totalPrice
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
