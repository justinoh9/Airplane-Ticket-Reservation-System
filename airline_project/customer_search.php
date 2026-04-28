<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Flights</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Search Future Flights</h1>
    <form method="GET">
        <label>Departure Airport Code:</label><br>
        <input type="text" name="departure" required><br><br>
        <label>Arrival Airport Code:</label><br>
        <input type="text" name="arrival" required><br><br>
        <label>Date:</label><br>
        <input type="date" name="flight_date" required><br><br>
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['departure'], $_GET['arrival'], $_GET['flight_date'])) {
        $departure = mysqli_real_escape_string($conn, strtoupper($_GET['departure']));
        $arrival = mysqli_real_escape_string($conn, strtoupper($_GET['arrival']));
        $flight_date = mysqli_real_escape_string($conn, $_GET['flight_date']);

        $sql = "SELECT * FROM Flight
                WHERE departure_airport='$departure'
                  AND arrival_airport='$arrival'
                  AND DATE(departure_datetime)='$flight_date'
                  AND departure_datetime > NOW()";
        $result = mysqli_query($conn, $sql);

        echo "<h2>Results</h2>";
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='8'>";
            echo "<tr><th>Airline</th><th>Flight Number</th><th>Departure</th><th>Arrival</th><th>Price</th><th>Status</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['airline_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['flight_number']) . "</td>";
                echo "<td>" . htmlspecialchars($row['departure_datetime']) . "</td>";
                echo "<td>" . htmlspecialchars($row['arrival_datetime']) . "</td>";
                echo "<td>" . htmlspecialchars($row['base_price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No matching flights found.</p>";
        }
    }
    ?>

    <br><a href="index.php">Back to Home</a>
</body>
</html>