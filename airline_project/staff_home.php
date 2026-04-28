<?php
session_start();
if (!isset($_SESSION['staff_username'])) {
    header("Location: login_staff.php?message=Please login first");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Airline Staff Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Airline Staff Home</h1>
    <p>Logged in as: <?php echo htmlspecialchars($_SESSION['staff_username']); ?></p>
    <p>Airline: <?php echo htmlspecialchars($_SESSION['staff_airline']); ?></p>
    <ul>
        <li><a href="staff_view_flights.php">View Flights</a></li>
        <li><a href="staff_add_airplane.php">Add Airplane</a></li>
        <li><a href="staff_create_flight.php">Create Flight</a></li>
        <li><a href="staff_change_status.php">Change Flight Status</a></li>
        <li><a href="staff_view_customers.php">View Customers on Flight</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>