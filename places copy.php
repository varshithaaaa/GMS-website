<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Admin Dashboard</title>
  <style >
    /* Reset default margin and padding */
body, h1, h2, h3, ul, li, p {
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  background-color: #CCCCFF;
}

header {
  background-color: #53c5bc;
  color: #fff;
  padding: 10px;
  display: flex;
}
h1{
  padding-left: 10px;
}
nav ul {
  list-style: none;
    text-align: right;
    padding: 29px;
    margin-left: 756px;
}

nav li {
  margin-right: 20px;
  text-align: center;
  display: inline-block;
}

nav a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

section {
            width: 80%;
            margin: 30px;
            margin-bottom: 30px;
            padding: 5px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
section h2{
  text-align: center;
}
a{
  text-decoration: none;
  color: black;
}
h1 a{
   text-decoration: none;
  color: white;
}
button {
  width: 14%;
    background-color: #e0c2b2;
    color: #fff;
    padding: 18px 17px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 394px;
    margin-left: -1100px;

}

.column {
  float: left;
  width: 25%;
  padding: 19px 8px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 1 0px 11px 0 rgba(16, 10, 4, 1.2);
    padding: 41px;
    text-align: center;
    background-color: #53c5bc;
    border-radius: 130px;
    height: 53px;
    width: 71px;
    margin-left: 252px;
}

  </style>
</head>
<body>
<header>
    <img src="images/icon (1).svg" style="width: 83px;
    height: 77px;
    margin-left: 83px;">
   
    <nav>
    <ul>
    <li><a href="adashboard.php">HOME</a></li>
      <li><a href="addemp.php">ADD USERS</a></li>
      <li><a href="profile.php">PROFILE</a></li>
      <li><a href="logout.php">LOG OUT</a></li>
    </ul>
  </nav>
  </header>
  <center style="margin-top: 35px;">
<?php
$conn = mysqli_connect("localhost", "root", "", "gms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve places from the database
$sql = "SELECT * FROM places";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $place_id = $row['place_id'];
        $place_name = $row['place_name'];
        $image_path = $row['image_path'];

        // Create a link to the details page for each place with a button
        echo "<div class='column'>";
        echo "<div class='card'>";
        echo "<h3><a href='locDetails.php?location=$place_name'>$place_name</a></h3>";


        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No results found.";
}


// Close the database connection
$conn->close();
?>

  <button type="submit"><a href="addplace.php">Add place</a></button></center>


</body>
</html>

    
      