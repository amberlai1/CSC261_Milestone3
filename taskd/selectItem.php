<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data from MySQL Database</title>
    <link rel="stylesheet" href="tables.css">

</head>
<body>

<h2>Data from MySQL Database</h2>
<?php
$servername = "localhost";
$username = "newuser";
$password = "no";
$dbname = "KEA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT itemName, itemID, price, distributorID, itemType FROM item";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>name</th><th>itemID</th><th>price</th><th>distributorID</th><th>itemType</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["itemName"]."</td><td>".$row["itemID"]."</td><td>".$row["price"]."</td><td>".$row["distributorID"]."</td><td>".$row["itemType"]."</td></tr>";
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