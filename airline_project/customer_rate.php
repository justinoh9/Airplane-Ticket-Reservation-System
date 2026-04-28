<?php
session_start();
include("db.php");
if (!isset($_SESSION['customer_email'])) {
    header("Location: login_customer.php?message=Please login first");
    exit();
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['customer_email'];
    $airline = mysqli_real_escape_string($conn, $_POST['airline_name']);
    $flight = mysqli_real_escape_string($conn, $_POST['flight_number']);
    $departure_datetime = mysqli_real_escape_string($conn, $_POST['departure_datetime']);
    $rating = (int)$_POST['rating'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $sql = "INSERT INTO Rates VALUES ('$email', '$airline', '$flight', '$departure_datetime', $rating, '$comment')";
    if (mysqli_query($conn, $sql)) {
        $message = "Rating submitted successfully.";
    } else {
        $message = "Submission failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Rate Flight</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Rate / Comment on Past Flight</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <label>Airline Name:</label><br><input type="text" name="airline_name" required><br><br>
    <label>Flight Number:</label><br><input type="text" name="flight_number" required><br><br>
    <label>Departure DateTime (YYYY-MM-DD HH:MM:SS):</label><br><input type="text" name="departure_datetime" required><br><br>
    <label>Rating (1-5):</label><br><input type="number" name="rating" min="1" max="5" required><br><br>
    <label>Comment:</label><br><textarea name="comment" rows="4" cols="40"></textarea><br><br>
    <input type="submit" value="Submit Rating">
</form>
<br><a href="customer_home.php">Back</a>
</body>
</html>