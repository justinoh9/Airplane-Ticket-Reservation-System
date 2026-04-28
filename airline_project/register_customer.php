<?php
include("db.php");
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $building_number = mysqli_real_escape_string($conn, $_POST['building_number']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $passport_number = mysqli_real_escape_string($conn, $_POST['passport_number']);
    $passport_expiration = mysqli_real_escape_string($conn, $_POST['passport_expiration']);
    $passport_country = mysqli_real_escape_string($conn, $_POST['passport_country']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);

    $sql = "INSERT INTO Customer VALUES ('$email', '$name', '$password', '$building_number', '$street', '$city', '$state', '$phone_number', '$passport_number', '$passport_expiration', '$passport_country', '$date_of_birth')";
    if (mysqli_query($conn, $sql)) {
        $message = "Customer registered successfully.";
    } else {
        $message = "Registration failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Customer Registration</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Customer Registration</h1>
<?php if ($message) echo '<p>' . htmlspecialchars($message) . '</p>'; ?>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="building_number" placeholder="Building Number"><br><br>
    <input type="text" name="street" placeholder="Street"><br><br>
    <input type="text" name="city" placeholder="City"><br><br>
    <input type="text" name="state" placeholder="State"><br><br>
    <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
    <input type="text" name="passport_number" placeholder="Passport Number" required><br><br>
    <input type="date" name="passport_expiration" required><br><br>
    <input type="text" name="passport_country" placeholder="Passport Country" required><br><br>
    <input type="date" name="date_of_birth" required><br><br>
    <input type="submit" value="Register">
</form>
<br><a href="index.php">Back to Home</a>
</body>
</html>