<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="receipt.css" />
    <title>Receipt - Keene Guest Lodge</title>
</head>
<body>
    <h1>Keene Guest Lodge</h1>
    <h2>Booking Receipt</h2>

    <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
    <p><strong>Surname:</strong> <?php echo htmlspecialchars($_GET['surname']); ?></p>
    <p><strong>Room Type:</strong> <?php echo htmlspecialchars($_GET['roomtype']); ?></p>
    <p><strong>Number of Rooms:</strong> <?php echo htmlspecialchars($_GET['numberofrooms']); ?></p>
    <p><strong>Number of Guests:</strong> <?php echo htmlspecialchars($_GET['numberofguests']); ?></p>
    <p><strong>Check-in Date:</strong> <?php echo htmlspecialchars($_GET['checkin']); ?></p>
    <p><strong>Check-out Date:</strong> <?php echo htmlspecialchars($_GET['checkout']); ?></p>
    <p><strong>Total Paid:</strong> R<?php echo htmlspecialchars($_GET['totalPrice']); ?></p>

    <p>Thank you for booking with Keene Guest Lodge!</p>
</body>
</html>
