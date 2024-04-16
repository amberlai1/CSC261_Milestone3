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
$username = "newuser"; // fill in with your data
$password = "no"; // fill in with your data
$dbname = "KEA"; // fill in with your data

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  // Get form data
  $itemID = $_POST['itemID'];
  $distributorID = $_POST['distributorID'];
  $quantity = $_POST['quantity'];
  $availability = $_POST['availability'];


  $sql = "INSERT INTO availability (itemID, distributorID, quantity, availability)
VALUES ('$itemID', '$distributorID', '$quantity', '$availability')";

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