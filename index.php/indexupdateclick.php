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
    $address = $_POST['email'];
    $contact = $_POST['number'];
    $name = $_POST['name'];

    // Sanitize inputs to prevent SQL injection (use proper database-specific methods)
    $address = mysqli_real_escape_string($conn, $address);
    $contact = mysqli_real_escape_string($conn, $contact);
    $name = mysqli_real_escape_string($conn, $name);

    // Build the SQL query using string concatenation
    $sql = "UPDATE user SET email = '$address', contact = '$contact' WHERE uname = '$name'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully.";
        
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
