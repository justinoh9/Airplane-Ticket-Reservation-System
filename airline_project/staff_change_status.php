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
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE Flight SET status='$status' WHERE airline_name='$airline' AND flight_number='$flight_number' AND departure_datetime='$departure_datetime'";
    if (mysqli_query($conn, $sql)) {
        $message = "Flight status updated successfully.";
    } else {
        $message = "Failed to update status: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Change Flight Status</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Change Flight Status</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <input type="text" name="flight_number" placeholder="Flight Number" required><br><br>
    <input type="text" name="departure_datetime" placeholder="Departure Datetime (YYYY-MM-DD HH:MM:SS)" required><br><br>
    <input type="text" name="status" placeholder="New Status" required><br><br>
    <input type="submit" value="Update Status">
</form>
<br><a href="staff_home.php">Back</a>
</body>
</html>