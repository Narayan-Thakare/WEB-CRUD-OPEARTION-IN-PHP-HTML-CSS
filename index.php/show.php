<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my";

$conn = new mysqli($servername, $username, $password, $dbname, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, uname, email, contact, age, gender,language,comment FROM user";

$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        /* Add some basic CSS for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<a href="index.php">profile page</a>
<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Contact</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Language</th>";
    echo "<th>Comment</th>";

    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['id']. "</td>";
        echo "<td>" . $row['uname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['language'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";

        echo '<td><a href="showupadate.php?id=' . $row["id"] . '">Update</a></td>';
       echo '<td><a href="showdelete.php?name=' . $row["uname"] . '">Delete</a></td>';
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}

$conn->close();
?>

</body>
</html>
