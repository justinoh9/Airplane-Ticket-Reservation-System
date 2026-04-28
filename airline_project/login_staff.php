<!DOCTYPE html>
<html>
<head>
    <title>Airline Staff Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Airline Staff Login</h1>
    <form action="login_auth_staff.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>