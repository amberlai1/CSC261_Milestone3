<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data from Customer</title>
    <link rel="stylesheet" href="tables.css">
</head>
<body>

<h2>Data from Customer</h2>
<?php
$servername = "localhost";
$username = "newuser";
$password = "no";
$dbname = "KEA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT customerId, email, phoneNumber, firstName, lastName FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Customer ID</th><th>Email</th><th>Phone Number</th><th>First Name</th><th>Last Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["customerId"]."</td><td>".$row["email"]."</td><td>".$row["phoneNumber"]."</td><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<br>
<a class= "link" href="index.html">Back to Home</a>

</body>
</html>