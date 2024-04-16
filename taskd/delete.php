<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Deletion</h2>

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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tableName = $_POST['tableName'];
    $entityID = $_POST['entityID'];

    switch($tableName) {
        case 'customer':
            $sql = "DELETE FROM customer WHERE customerID = '$entityID'";
            break;
        case 'distributor':
            $sql = "DELETE FROM distributor WHERE distributorID = '$entityID'";
            break;
        case 'item':
            $sql = "DELETE FROM item WHERE itemID = '$entityID'";
            break;
        case 'transaction':
            $sql = "DELETE FROM transaction WHERE transactionID = '$entityID'";
            break;
        case 'availability':
            $sql = "DELETE FROM availability WHERE availabilityID = '$entityID'";
            break;      
        default:
            echo "Invalid table selection";
            exit; 
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
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
