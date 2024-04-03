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

h1 a{
   text-decoration: none;
  color: white;
}
a{
  text-decoration: none;
  color: white;
}

        .container {
            max-width: 471px;
            margin: 51px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result-box {
          border: 1px solid #ddd;
    padding: 29px;
    margin-bottom: 27px;
    background-color: #53c5bc;
    box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
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
  <center>

<div class="container">
    <h2>Location Details</h2>
<br>
    <?php
    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "gms");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create an array to store the results
    $results = array();

    $selectedLocation = $_GET['location']; // Replace with the actual location

    $query = "SELECT name, COUNT(workers) AS total_workers
              FROM team
              WHERE location = '$selectedLocation'
              GROUP BY name;";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Add each row to the results array
            $results[] = $row;
        }
        // Free the result set
        mysqli_free_result($result);
    }

    // Display the results
    if (!empty($results)) {
        // If there are results, loop through and display
        foreach ($results as $result) {
            echo "<div class='result-box'>";
            echo "<p><strong>Supervisor Name:</strong> " . $result['name'] . "</p>";
            echo "<p><strong>No of Workers:</strong> " . $result['total_workers'] . "</p>";
            echo "</div>";
        }
    } else {
        // If no data is retrieved, display a message
        echo "<p>No data available</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</div>

</center>
</body>
</html>