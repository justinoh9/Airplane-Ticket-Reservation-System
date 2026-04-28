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
    $card_type = mysqli_real_escape_string($conn, $_POST['card_type']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $name_on_card = mysqli_real_escape_string($conn, $_POST['name_on_card']);
    $expiration_date = mysqli_real_escape_string($conn, $_POST['expiration_date']);

    $seat_sql = "SELECT a.num_seats, COUNT(t.ticket_id) AS sold
                 FROM Flight f
                 JOIN Airplane a ON f.airline_name = a.airline_name AND f.airplane_id = a.airplane_id
                 LEFT JOIN Ticket t ON f.airline_name = t.airline_name AND f.flight_number = t.flight_number AND f.departure_datetime = t.departure_datetime
                 WHERE f.airline_name='$airline' AND f.flight_number='$flight' AND f.departure_datetime='$departure_datetime'
                 GROUP BY a.num_seats";
    $seat_result = mysqli_query($conn, $seat_sql);

    if ($seat_result && mysqli_num_rows($seat_result) === 1) {
        $seat_row = mysqli_fetch_assoc($seat_result);
        if ((int)$seat_row['sold'] < (int)$seat_row['num_seats']) {
            $id_result = mysqli_query($conn, "SELECT COALESCE(MAX(ticket_id), 0) + 1 AS next_id FROM Ticket");
            $id_row = mysqli_fetch_assoc($id_result);
            $ticket_id = $id_row['next_id'];

            $insert_sql = "INSERT INTO Ticket VALUES ($ticket_id, '$card_type', '$card_number', '$name_on_card', '$expiration_date', CURDATE(), CURTIME(), '$email', '$airline', '$flight', '$departure_datetime')";
            if (mysqli_query($conn, $insert_sql)) {
                $message = "Ticket purchased successfully.";
            } else {
                $message = "Purchase failed: " . mysqli_error($conn);
            }
        } else {
            $message = "No seats available for this flight.";
        }
    } else {
        $message = "Flight not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Purchase Ticket</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Purchase Ticket</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <label>Airline Name:</label><br><input type="text" name="airline_name" required><br><br>
    <label>Flight Number:</label><br><input type="text" name="flight_number" required><br><br>
    <label>Departure DateTime (YYYY-MM-DD HH:MM:SS):</label><br><input type="text" name="departure_datetime" required><br><br>
    <label>Card Type:</label><br><input type="text" name="card_type" required><br><br>
    <label>Card Number:</label><br><input type="text" name="card_number" required><br><br>
    <label>Name on Card:</label><br><input type="text" name="name_on_card" required><br><br>
    <label>Expiration Date:</label><br><input type="date" name="expiration_date" required><br><br>
    <input type="submit" value="Purchase">
</form>
<br><a href="customer_home.php">Back</a>
</body>
</html>