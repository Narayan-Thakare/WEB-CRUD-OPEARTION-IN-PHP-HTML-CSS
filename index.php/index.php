<?php 
 if(empty($_GET['name']))
 {
  echo "";
 }
?><!DOCTYPE html>
<html>
<head>
  <title>Simple Form</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      border: 1px solid #dddddd;
      background-color: #fff;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #dddddd;
      border-radius: 5px;
    }

    .gender-options {
      margin-bottom: 15px;
    }

    .gender-options label {
      margin-right: 15px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Add some basic CSS for the search form */
    form[action="search.php"] {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    input[type="text"][name="search"] {
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

    /* Add some basic CSS for the delete form */
    form[action="delete.php"] {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    input[type="text"][name="delete"] {
      width: 200px;
      padding: 5px;
      border: 1px solid #dddddd;
      border-radius: 5px 0 0 5px;
    }

    button[type="submit"] {
      background-color: #f44336;
      color: #fff;
      padding: 5px 10px;
      border: none;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }
  </style>

</head>
<body>
  <div class="container">
    <h1>Contact Information</h1>
    <form action="mysql.php" method="get">
      <label for="name"> Full Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>
       
      

      <label for="contact">Contact Number:</label>
      <input type="tel" id="contact" name="contact" required>
      
      <label for="age">Age:</label>
<input type="text" id="age" name="age" required pattern="[0-9]{2}" title="Please enter a two-digit number (00-99)">


      <label>Gender:</label>
      <div class="gender-options">
        <label for="male">
          <input type="radio" id="Male" name="gender" value="Male" required>
          Male
        </label>
        <label for="female">
          <input type="radio" id="Female" name="gender" value="Female" required>
          Female
        </label>
        <label for="other">
          <input type="radio" id="Other" name="gender" value="Other" required>
          Other
        </label>
      </div>


       <label for="language"> Preferred Programming Language</label>
<select id="language" name="language" required>
  <option value="" disabled selected>Select your language</option>
  <option value="php">PHP</option>
  <option value="java script">JAVA SCRIPT</option>
  <option value="python">PYTHON</option>
  <option value="c++">C++</option>
  <option value="java">JAVA</option> 

</select>

<br>


      
      <label for="comment">Commemts</label>
<textarea id="comment" name="comment" required></textarea>
<br> 

      <input type="submit" value="Submit">
    </form>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <form action="show.php" method="get">
      
      
      <input type="submit" value="Show data">
    </form>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<form action="search.php" method="get">
  <input type="text" name="search" placeholder="Enter name to search">
  <button type="submit">Search</button>
</form>


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <form action="delete.php" method="get">
        <label for="delete">Enter Name to Delete:</label>
        <input type="text" id="delete" name="delete" placeholder="Enter name to search">
        <button type="submit">Delete</button>
    </form>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




<form action="indexupdateclick.php" method="post">
    <h1>Update data</h1>
   Enter name to update: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Contact no.: <input type="number" name="number"><br>
    <input type="submit" value="Click me">
</form>










  </div>
</body>
</html>