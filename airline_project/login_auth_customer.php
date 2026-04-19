<?php
session_start();
include("db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM Customer WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $_SESSION['customer_email'] = $email;
    header("Location: customer_home.php");
    exit();
} else {
    header("Location: login_customer.php?message=Invalid login");
    exit();
}
?>