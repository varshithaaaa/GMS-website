
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>garden management system</title>
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
    margin-left: 586px;
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
a{
  text-decoration: none;
  color: white;
}

.aa{
  display: flex;
  justify-content: center;
}

.issue-section{
 width: 36%;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}

h6 {
    display: block;
    font-weight: bold;
    margin-right: 300px;
}

button {
  text-align: right;
      background-color: #53c5bc;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin-left: 10px;
    margin-top: 15px;
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
        <li><a href="assigntask.php">Assign Task</a></li>
        <li><a href="sjobs.php">Jobs</a></li>
        <li><a href="assets.php">Assets</a></li>
        <li><a href="sleaderboard.php">Leaderbooard</a></li>
        <li><a href="sprofile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="bell.php"><img src="bell.svg"></a></li>
      </ul>
    </nav>
  </header>
  <button type="submit" name="submit"><a href="reqassets.php">Request Asset</a></button>
<center>
<?php
$conn = mysqli_connect("localhost", "root", "", "gms");
session_start();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$supervisor = $_SESSION['name'];
// Retrieve issues from the database
$sql = "SELECT * FROM assets WHERE supervisor='$supervisor'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tool_name = $row['asset'];
        $quantity = $row['quantity'];
        
        // Check if the 'status' is null and assign a default value
        $status = ($row['status'] !== null) ? $row['status'] : 'default';

        // Define a class based on the status
        $statusClass = ($status === 'pending') ? 'pending' : '';

        echo "<div class='issue-section $statusClass'>";
        echo "<h5>Asset Name: $tool_name</h5>";
        echo "<div class='aa'>";
        echo "<h5 style='margin-right: -95px;margin-top: 38px;'>Quantity: $quantity</h5><br>";
        echo "<p>Status: $status</p>"; // Display the status for debugging
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No assets found.";
}

// Close the database connection
$conn->close();
?>


</center>
</body>
</html>