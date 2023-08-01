<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my"; // Replace 'my' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3308);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have already retrieved the values from $_POST or elsewhere
    $id = $_POST['id'];
    $address = $_POST['email'];
    $contact = $_POST['number'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $language = $_POST['language'];




    // Sanitize inputs to prevent SQL injection (use proper database-specific methods)
    $id = mysqli_real_escape_string($conn, $id);
    $address = mysqli_real_escape_string($conn, $address);
    $contact = mysqli_real_escape_string($conn, $contact);
    $name = mysqli_real_escape_string($conn, $name);
    $gender = mysqli_real_escape_string($conn, $gender);
    $age = mysqli_real_escape_string($conn, $age);
    $language = mysqli_real_escape_string($conn, $language);


    // Build the SQL query using string concatenation
    $sql = "UPDATE user SET email = '$address', contact = '$contact', uname = '$name', gender = '$gender', age = '$age', language = '$language' WHERE id = '$id'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully.";
        require 'show.php'; // This line should be changed based on your requirements
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

// Close the database connection
?>
