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
    margin-left: 817px;
}
h1 a{
   text-decoration: none;
  color: white;
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
 width: 28%;
    margin-bottom: 30px;
    padding: 26px;
    border: 1px solid #ddd;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    height: 152px;
        }
section h2{
  text-align: center;
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
        <li><a href="jobs.php">JOBS</a></li>
        <li><a href="profile.php">PROFILE</a></li>
        <li><a href="logout.php">LOG OUT</a></li>
        <li><a href="mbell.php"><img src="bell.svg"></a></li>
      </ul>
    </nav>
  </header>
<center style="margin-top: 44px;">
<?php
$conn = mysqli_connect("localhost", "root", "", "gms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "Approve" button is clicked
    if (isset($_POST['Approve'])) {
        // Get the asset ID from the hidden input field
        $id = $_POST['id'];

        // Update the status to "approved" in the database
        $approveQuery = "UPDATE assets SET status = 'approved' WHERE id = ?";
        $stmt = mysqli_prepare($conn, $approveQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Asset Approved successfully!";
        } else {
            echo "Error approving asset: " . mysqli_error($conn);
        }
    }

    // Check if the "Decline" button is clicked
    if (isset($_POST['Decline'])) {
        // Get the asset ID from the hidden input field
        $id = $_POST['id'];

        // Delete the asset from the database
        $deleteQuery = "DELETE FROM assets WHERE id = ?";
        $stmt = mysqli_prepare($conn, $deleteQuery);

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Asset Declined successfully!";
        } else {
            echo "Error declining asset: " . mysqli_error($conn);
        }
    }
}

// Retrieve assets from the database
$sql = "SELECT * FROM assets WHERE status ='pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $asset = $row['asset'];
        $quantity = $row['quantity'];
        $id = $row['id'];

        echo "<form method='post'>";  // Updated form method
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<div class='issue-section' id='notification_$id'>";
        echo "<section>";
        echo "<h5> $asset</h5>";
        echo "<h5> $quantity</h5>";
        echo "<button style='background-color:#53c5bc;' type='submit' name='Approve'>Approve</button><br><br>";
        echo "<button style='background-color:#53c5bc;' type='submit' name='Decline'>Decline</button>";
        echo "</section>";
        echo "</div>";
        echo "</form>";
    }
} else {
    echo "No notifications found.";
}

// Close the database connection
mysqli_close($conn);
?>


</center>
</body>

</html>
