<?php
session_start();
include("db.php");
if (!isset($_SESSION['staff_username'])) {
    header("Location: login_staff.php?message=Please login first");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>View Customers on Flight</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>View Customers on a Flight</h1>
<form method="GET">
    <label>Flight Number:</label><br><input type="text" name="flight_number" required><br><br>
    <label>Departure Datetime (YYYY-MM-DD HH:MM:SS):</label><br><input type="text" name="departure_datetime" required><br><br>
    <input type="submit" value="View Customers">
</form>
<?php
if (isset($_GET['flight_number'], $_GET['departure_datetime'])) {
    $airline = $_SESSION['staff_airline'];
    $flight_number = mysqli_real_escape_string($conn, $_GET['flight_number']);
    $departure_datetime = mysqli_real_escape_string($conn, $_GET['departure_datetime']);

    $sql = "SELECT c.name, c.email FROM Ticket t
            JOIN Customer c ON t.customer_email = c.email
            WHERE t.airline_name='$airline' AND t.flight_number='$flight_number' AND t.departure_datetime='$departure_datetime'
            ORDER BY c.name";
    $result = mysqli_query($conn, $sql);

    echo "<h2>Customers</h2>";
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='8'><tr><th>Name</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No customers found for that flight.</p>";
    }
}
?>
<br><a href="staff_home.php">Back</a>
</body>
</html>