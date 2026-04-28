<?php
include("db.php");
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $airline_name = mysqli_real_escape_string($conn, $_POST['airline_name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    $sql = "INSERT INTO Airline_Staff VALUES ('$username', '$password', '$first_name', '$last_name', '$date_of_birth', '$email', '$airline_name')";
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "INSERT INTO Staff_Phone VALUES ('$username', '$phone_number')");
        $message = "Staff registered successfully.";
    } else {
        $message = "Registration failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Staff Registration</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Airline Staff Registration</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="first_name" placeholder="First Name" required><br><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br><br>
    <input type="date" name="date_of_birth" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="airline_name" placeholder="Airline Name" required><br><br>
    <input type="text" name="phone_number" placeholder="Phone Number" required><br><br>
    <input type="submit" value="Register">
</form>
<br><a href="index.php">Back to Home</a>
</body>
</html>