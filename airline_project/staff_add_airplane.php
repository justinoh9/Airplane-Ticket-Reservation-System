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
    $airplane_id = (int)$_POST['airplane_id'];
    $num_seats = (int)$_POST['num_seats'];
    $company = mysqli_real_escape_string($conn, $_POST['manufacturing_company']);
    $date = mysqli_real_escape_string($conn, $_POST['manufacturing_date']);

    $sql = "INSERT INTO Airplane VALUES ('$airline', $airplane_id, $num_seats, '$company', '$date')";
    if (mysqli_query($conn, $sql)) {
        $message = "Airplane added successfully.";
    } else {
        $message = "Failed to add airplane: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Airplane</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Add Airplane</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <input type="number" name="airplane_id" placeholder="Airplane ID" required><br><br>
    <input type="number" name="num_seats" placeholder="Number of Seats" required><br><br>
    <input type="text" name="manufacturing_company" placeholder="Manufacturing Company" required><br><br>
    <input type="date" name="manufacturing_date" required><br><br>
    <input type="submit" value="Add Airplane">
</form>
<br><a href="staff_home.php">Back</a>
</body>
</html>