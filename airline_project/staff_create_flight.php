<?php
session_start();
include("db.php");
if (!isset($_SESSION['staff_username'])) {
    header("Location: login_staff.php?message=Please login first");
    exit();
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airline = $_SESSION['staff_airline'];
    $flight_number = mysqli_real_escape_string($conn, $_POST['flight_number']);
    $departure_datetime = mysqli_real_escape_string($conn, $_POST['departure_datetime']);
    $arrival_datetime = mysqli_real_escape_string($conn, $_POST['arrival_datetime']);
    $base_price = (float)$_POST['base_price'];
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $departure_airport = mysqli_real_escape_string($conn, strtoupper($_POST['departure_airport']));
    $arrival_airport = mysqli_real_escape_string($conn, strtoupper($_POST['arrival_airport']));
    $airplane_id = (int)$_POST['airplane_id'];

    $sql = "INSERT INTO Flight VALUES ('$airline', '$flight_number', '$departure_datetime', '$arrival_datetime', $base_price, '$status', '$departure_airport', '$arrival_airport', $airplane_id)";
    if (mysqli_query($conn, $sql)) {
        $message = "Flight created successfully.";
    } else {
        $message = "Failed to create flight: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Create Flight</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Create Flight</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <input type="text" name="flight_number" placeholder="Flight Number" required><br><br>
    <input type="text" name="departure_datetime" placeholder="Departure Datetime (YYYY-MM-DD HH:MM:SS)" required><br><br>
    <input type="text" name="arrival_datetime" placeholder="Arrival Datetime (YYYY-MM-DD HH:MM:SS)" required><br><br>
    <input type="number" step="0.01" name="base_price" placeholder="Base Price" required><br><br>
    <input type="text" name="status" placeholder="Status (on-time or delayed)" required><br><br>
    <input type="text" name="departure_airport" placeholder="Departure Airport Code" required><br><br>
    <input type="text" name="arrival_airport" placeholder="Arrival Airport Code" required><br><br>
    <input type="number" name="airplane_id" placeholder="Airplane ID" required><br><br>
    <input type="submit" value="Create Flight">
</form>
<br><a href="staff_home.php">Back</a>
</body>
</html>