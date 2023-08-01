<!DOCTYPE html>
<html>
<head>
  <title>Search User</title>
  <style>
    /* Styles for the page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
      border: 1px solid #dddddd;
      background-color: #fff;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    input[type="text"] {
      width: 200px;
      padding: 5px;
      border: 1px solid #dddddd;
      border-radius: 5px 0 0 5px;
    }

    button[type="submit"] {
      background-color: #008CBA;
      color: #fff;
      padding: 5px 10px;
      border: none;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }

    .search-results {
      margin-top: 20px;
      border-top: 1px solid #dddddd;
      padding-top: 10px;
    }

    .search-results table {
      width: 100%;
      border-collapse: collapse;
    }

    .search-results th, .search-results td {
      padding: 8px;
      border-bottom: 1px solid #dddddd;
    }

    .search-results th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Search User</h1>
    <form action="search.php" method="get">
      <input type="text" name="search" placeholder="Enter name to search" required>
      <button type="submit">Search</button>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "my"; // Replace 'my' with your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname, 3308);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo '<div class="search-results">';
    if (isset($_GET['search'])) {
        $searchName = $_GET['search'];
        $stmt = $conn->prepare("SELECT id, uname, email, contact, gender,age,language,comment FROM user WHERE uname LIKE ?");
        $searchName = '%' . $searchName . '%';
        $stmt->bind_param("s", $searchName);
        
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result === false) {
            die("Error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Gender</th> <th>Age</th>  <th>Language</th>  <th>Comment</th>  <th>Update</th> <th>delete</th>   </tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';

                echo '<td>' . $row['uname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['contact'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['language'] . '</td>';
                echo '<td>' . $row['comment'] . '</td>';
                echo '<td><a href="showupadate.php?id=' . $row["id"] . '">Update</a></td>';
                echo '<td><a href="showdelete.php?name=' . $row["uname"] . '">Delete</a></td>';

                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "<p>No data found.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Please enter a name to search.</p>";
    }

    echo '</div>';

    $conn->close();
    ?>
  </div>
