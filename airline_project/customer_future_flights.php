<?php
session_start();
include("db.php");
if (!isset($_SESSION['customer_email'])) {
    header("Location: login_customer.php?message=Please login first");
    exit();
}
$email = $_SESSION['customer_email'];
$sql = "SELECT f.* FROM Ticket t
        JOIN Flight f
          ON t.airline_name = f.airline_name
         AND t.flight_number = f.flight_number
         AND t.departure_datetime = f.departure_datetime
        WHERE t.customer_email='$email' AND f.departure_datetime > NOW()
        ORDER BY f.departure_datetime";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>Future Flights</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>My Future Flights</h1>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'><tr><th>Flight</th><th>Departure</th><th>Arrival</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row['flight_number']) . "</td><td>" . htmlspecialchars($row['departure_datetime']) . "</td><td>" . htmlspecialchars($row['arrival_datetime']) . "</td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No future flights found.</p>";
}
?>
<br><a href="customer_home.php">Back</a>
</body>
</html>