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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  // Get form data
  $companyName = $_POST['companyName'];
  $distributorID = $_POST['distributorID'];

  $sql = "INSERT INTO distributor (companyName, distributorID)
VALUES ('$companyName', '$distributorID')";

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