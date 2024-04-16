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
  $companyName = $_POST['companyName'];
  $distributorID = $_POST['distributorID'];

  $sql = "UPDATE distributor SET companyName='$companyName' WHERE distributorID='$distributorID'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
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