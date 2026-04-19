<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    header("Location: login_customer.php?message=Please login first");
    exit();
}

$customer_email = $_SESSION['customer_email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Customer Home</h1>
    <p>Logged in as: <?php echo htmlspecialchars($customer_email); ?></p>

    <ul>
        <li><a href="customer_search.php">Search Flights</a></li>
        <li><a href="customer_future_flights.php">View Future Flights</a></li>
        <li><a href="customer_past_flights.php">View Past Flights</a></li>
        <li><a href="customer_purchase.php">Purchase Ticket</a></li>
        <li><a href="customer_rate.php">Rate / Comment on Past Flight</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>