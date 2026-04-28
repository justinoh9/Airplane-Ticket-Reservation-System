<?php
session_start();
include("db.php");
if (!isset($_SESSION['staff_username'])) {
    header("Location: login_staff.php?message=Please login first");
    exit();
}
$airline = $_SESSION['staff_airline'];
$sql = "SELECT * FROM Flight WHERE airline_name='$airline' ORDER BY departure_datetime DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>View Flights</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Flights for <?php echo htmlspecialchars($airline); ?></h1>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'><tr><th>Flight</th><th>Departure</th><th>Arrival</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row['flight_number']) . "</td><td>" . htmlspecialchars($row['departure_datetime']) . "</td><td>" . htmlspecialchars($row['arrival_datetime']) . "</td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No flights found.</p>";
}
?>
<br><a href="staff_home.php">Back</a>
</body>
</html>