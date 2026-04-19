<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Customer Login</h1>

    <form action="login_auth_customer.php" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>