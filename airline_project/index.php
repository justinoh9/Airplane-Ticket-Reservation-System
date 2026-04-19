<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Airline Ticket Reservation System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Airline Ticket Reservation System</h1>

    <h2>Welcome</h2>
    <p>Please choose an option below:</p>

    <ul>
        <li><a href="customer_search.php">Search Future Flights</a></li>
        <li><a href="login_customer.php">Customer Login</a></li>
        <li><a href="login_staff.php">Airline Staff Login</a></li>
        <li><a href="register_customer.php">Customer Registration</a></li>
        <li><a href="register_staff.php">Airline Staff Registration</a></li>
    </ul>

    <?php
    if (isset($_GET['message'])) {
        echo "<p>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>
</body>
</html>