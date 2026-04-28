<?php
session_start();
include("db.php");

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM Airline_Staff WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['staff_username'] = $username;
    $_SESSION['staff_airline'] = $row['airline_name'];
    header("Location: staff_home.php");
    exit();
}

header("Location: login_staff.php?message=Invalid login");
exit();
?>