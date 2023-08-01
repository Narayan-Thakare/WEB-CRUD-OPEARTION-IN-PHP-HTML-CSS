<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my";

$conn = new mysqli($servername, $username, $password, $dbname, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user data based on the provided name
    $sql = "SELECT uname, email, contact, gender ,age,language  FROM user WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $uname = $row['uname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $gender = $row['gender'];
        $age = $row['age'];
        $language = $row['language'];


    } else {
        echo "No user found with the given name.";
        exit();
    }
} else {
    echo "Invalid request.";
    $conn->close();
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Information</title>
    <style>
        /* Add some basic CSS for the form */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="update.php" method="post">
        <h2>Update User Information</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $uname; ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="contact">Contact:</label>
        <input type="number" id="number" name="number" value="<?php echo $contact; ?>" required><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>" required><br>


        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" <?php if ($gender === "Male") echo "checked"; ?> required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?php if ($gender === "Female") echo "checked"; ?>required>
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" <?php if ($gender === "Other") echo "checked"; ?>required>
        <label for="other">Other</label>




  <label for="language">Preferred Programming Language:</label>
<select id="language" name="language" required>
  <option value="" disabled selected>Select your language</option>
  <option value="php" <?php if ($language === "php") echo "selected"; ?>>PHP</option>
  <option value="java script" <?php if ($language === "java script") echo "selected"; ?>>JavaScript</option>
  <option value="python" <?php if ($language === "python") echo "selected"; ?>>Python</option>
  <option value="c++" <?php if ($language === "c++") echo "selected"; ?>>C++</option>
  <option value="java" <?php if ($language === "java") echo "selected"; ?>>Java</option>
</select>






        <input type="submit" value="Update User">
    </form>
    
</body>
</html>
