<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$uname = $_GET['name'];
$email = $_GET['email'];
$mob = $_GET['contact'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$language = $_GET['language'];
$comment = $_GET['comment'];


$sql = "INSERT INTO user (uname, email, contact, age, gender,language,comment ) 
        VALUES ('".$uname."', '".$email."', '".$mob."', '".$age."','".$gender."','".$language."','".$comment."')";

if ($conn->query($sql) === TRUE) {
  //  echo "Data inserted successfully.";
    require 'index.php';

   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
