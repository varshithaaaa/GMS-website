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

nav li {
  margin-right: 20px;
  text-align: center;
  display: inline-block;
}
a{
  text-decoration: none;
  color: white;
}

nav a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

section {
  width: 39%;
    margin-bottom: 30px;
    padding: 16px;
    border: 1px solid #ddd;
    background-color: aliceblue;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
        }
        section a{
          color: black;
        }
h5{
  text-align: center;
  text-decoration: none;
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
        <li><a href="mprofile.php">PROFILE</a></li>
        <li><a href="logout.php">LOG OUT</a></li>
        <li><a href="mbell.php"><img src="bell.svg"></a></li>
      </ul>
    </nav>
  </header>
<center>
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

            echo "<div class='issue-section'>";
            echo "<section>";
            echo "<h5><a href='loc.php?place_name=$place_name'>Name: $place_name</a></h5>";
            echo "</section>";
            echo "</div>";
        }
    } else {
        echo "No places found.";
    }

    // Close the database connection
    $conn->close();
  ?>
</center>
</body>

</html>
