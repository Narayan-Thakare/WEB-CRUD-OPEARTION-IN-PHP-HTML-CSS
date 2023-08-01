<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my";

$conn = new mysqli($servername, $username, $password, $dbname, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    // Validate and sanitize the input
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $dd = $_GET['name'];
        // You can add further validation if needed (e.g., check if the username exists in the database)
    } else {
        throw new Exception("Invalid or missing 'name' parameter.");
    }

    $stmt = $conn->prepare("DELETE FROM user WHERE uname = ?");
    $stmt->bind_param("s", $dd); 

    if ($stmt->execute()) {
        // Data deleted successfully, now redirect to show.php to display the updated user data
        header("Location: show.php");
        exit; // Ensure the script terminates after the redirect
    } else {
        throw new Exception("Error deleting data: " . $stmt->error);
    }

    $stmt->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
