<?php
$conn = mysqli_connect("localhost", "root", "", "gms");

if (isset($_POST['submit'])) {
    $tool_name = $_POST['tool_name'];
    $quantity = $_POST['quantity'];

    // Handle image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];

    // Move uploaded image to desired location
    $upload_path = ''; // Specify your upload directory
    $target_file = $upload_path . basename($image_name);

    if (move_uploaded_file($image_tmp, $target_file)) {
        // Image uploaded successfully, proceed with database operation
        $sql = "INSERT INTO tool (tool_name, quantity, image) VALUES ('$tool_name', '$quantity', '$target_file')
                ON DUPLICATE KEY UPDATE quantity = quantity + '$quantity'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Data inserted or updated successfully
            echo '<input type="hidden" id="success" value="1">';
        } else {
            // Error inserting or updating data
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Failed to upload image
        echo "Error uploading image.";
    }
}

mysqli_close($conn);
?>






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
    }

    h1 {
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

    nav a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    a {
      text-decoration: none;
      color: white;
    }

    .form-group {
      display: flex;
      margin-bottom: 10px;
    }

    label {
      display: flex;
      font-weight: bold;
      text-align: right;
      margin-right: 10px;
    }

    input {
      flex: 2;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-left: 10px;
    }

    button {
      background-color: #e0c2b2;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    form {
      width: 31%;
      margin: 20px auto;
      background-color: #fff;
      padding: 94px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
<center style="margin-top: 80px;">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="tool_name">Tool Name:</label>
      <input type="text" id="tool_name" name="tool_name" required>
    </div>
    <div class="form-group">
      <label for="quantity">Quantity:</label>
      <input type="text" id="quantity" name="quantity" style="margin-left: 21px;" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" id="image" name="image" style="margin-left: 21px;" required>
    </div>
    <button style="background-color:#53c5bc;" type="submit" name="submit">Add</button>
  </form>
</center>

<script>
    // Check if the hidden input field 'success' has a value of 1 (indicating success)
    if (document.getElementById('success') && document.getElementById('success').value === '1') {
      // Display alert message
      alert("Data added successfully.");
      
      // Redirect after displaying alert
      setTimeout(function() {
        window.location.href = 'equipment.php';
      }, 1000); // 1000 milliseconds = 1 second
    }
</script>



</body>
</html>

