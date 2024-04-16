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

$sql = "SELECT transactionID, customerID, itemID, distributorID FROM transaction";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>transactionID</th><th>customerID</th><th>itemID</th><th>distributorID</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["transactionID"]."</td><td>".$row["customerID"]."</td><td>".$row["itemID"]."</td><td>".$row["distributorID"]."</td>";
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