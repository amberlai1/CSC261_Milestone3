<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<h2>Insertion</h2>
 <?php
$servername = "localhost";
$username = "newuser"; 
$password = "no"; 
$dbname = "KEA"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  // Get form data
  $itemName = $_POST['itemName'];
  $itemID = $_POST['itemID'];
  $price = $_POST['price'];
  $distributorID = $_POST['distributorID'];
  $itemType = $_POST['itemType'];


  $sql = "INSERT INTO item (itemName, itemID, price, distributorID, itemType)
VALUES ('$itemName', '$itemID', '$price', '$distributorID', '$itemType')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}



$conn->close();

?> 
<br>
<a href="index.html">Back to Home</a>

</body>
</html>