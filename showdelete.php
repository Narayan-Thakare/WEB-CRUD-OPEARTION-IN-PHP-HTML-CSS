<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3308);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the empid parameter is provided in the URL
if (isset($_GET['id'])) {
    $empid = $_GET['id'];

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM user WHERE id = '$empid'";
    $stmt = $conn->prepare($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        require 'show.php';
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    }
$conn->close();
?>