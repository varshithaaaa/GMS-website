<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>gms</title>
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
section {
    display: flex;
    justify-content: space-between; /* Align items to start and end of the section */
    margin-bottom: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.message {
    flex-grow: 1; /* Allow the message to take up available space */
}

.delete-button {
    margin-left: 10px; /* Add some margin to separate the button from the message */
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
<center style="margin-top: 44px;">
  <!-- Add this in your HTML head section -->

  <?php
  session_start();
    $conn = mysqli_connect("localhost", "root","","gms");
    $supervisor=$_SESSION['name'];
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve issues from the database
    $sql = "SELECT * FROM notifications where supervisor='$supervisor'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $message = $row['message'];

       echo "<form style='width: 37%;' action='delete_notification.php' method='post'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<div class='issue-section' id='notification_$id'>";
echo "<section>";
echo "<div class='message'>$message</div>";
echo "<button type='submit' name='submit'>Clear</button>";
echo "</section>";
echo "</div>";
echo "</form>";

    }
}

    
 else {
        echo "No notifications found.";
    }

    // Close the database connection
    $conn->close();
    ?>


</center>
</body>

</html>
