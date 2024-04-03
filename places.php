<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Admin Dashboard</title>
  <style>
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
      justify-content: space-between; /* Align items horizontally */
      align-items: center; /* Align items vertically */
    }

    h1 {
      padding-left: 10px;
    }

    nav ul {
      list-style: none;
      text-align: right;
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

    .button-container {
  display: flex;
  justify-content: center;
}

.add-place-btn {
  background-color: #2ecc71;
  color: #fff;
  padding: 15px 25px;
  border: 2px solid #2980b9;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
}

.add-place-btn:hover {
  background-color: #2980b9;
  color: #fff;
}



    section {
      width: 80%;
      margin: 30px auto; /* Center the section horizontally */
      padding: 5px;
      border: 1px solid #ddd;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    section h2 {
      text-align: center;
    }

    .row {
      margin: 0 -5px;
    }

    .column {
      float: left;
      width: 25%;
      padding: 19px 8px;
      box-sizing: border-box;
    }

    .card {
      box-shadow: 1 0px 11px 0 rgba(16, 10, 4, 1.2);
      text-align: center;
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .card img {
  max-width: 100%; /* Set the maximum width of the image to 100% */
  max-height: 150px; /* Set the maximum height of the image to 150 pixels */
  border-radius: 10px; /* Keep the rounded corners */
}

  </style>
</head>
<body>
  <header>
    <img src="images/icon (1).svg" style="width: 83px; height: 77px; margin-left: 83px;">
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
  <div class="button-container">
  <button class="add-place-btn"><a href="addplace.php">Add Place</a></button>
</div>

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
              echo "<a href='locDetails.php?location=$place_name'><img src='$image_path' alt='$place_name'></a>";
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
    <!-- <button type="submit"><a href="addplace.php">Add place</a></button> -->
  </center>
</body>
</html>
