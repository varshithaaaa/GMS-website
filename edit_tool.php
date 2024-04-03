<?php
session_start();

// Check if tool_id is provided in the URL
$tool_id = isset($_GET['tool_id']) ? $_GET['tool_id'] : null;

// Initialize variables
$tool_name = '';
$quantity = '';
$image = '';

if ($tool_id) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "gms");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute SQL query to fetch tool details
    $sql = "SELECT * FROM tool WHERE tool_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tool_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $tool_name = $row['tool_name'];
        $quantity = $row['quantity'];
        $image = $row['image'];
    } else {
        echo "Error fetching tool details: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Edit Tool</title>
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
  <img src="images/icon (1).svg" style="width: 83px; height: 77px; margin-left: 83px;">
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
<form action="update_tool.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tool_id" value="<?php echo isset($tool_id) ? $tool_id : ''; ?>">

    <div class="form-group">
        <label for="tool_name">Tool Name:</label>
        <input type="text" id="tool_name" name="tool_name" value="<?php echo isset($tool_name) ? $tool_name : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required onchange="previewImage(event)">

        <!-- Image preview container -->
        <img id="imagePreview" src="<?php echo isset($image) ? $image : ''; ?>" alt="Image Preview" style="max-width: 100px; max-height: 100px; margin-top: 10px; <?php echo isset($image) ? 'display: block;' : 'display: none;'; ?>">
    </div>
    <button style="background-color:#53c5bc;" type="submit" name="submit">Update</button>
</form>
</center>

<script>
    // Function to preview the selected image
    function previewImage(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const imagePreview = document.getElementById('imagePreview');

        // Check if a file is selected
        if (file) {
            // Show the image preview container
            imagePreview.style.display = 'block';

            // Create a FileReader object
            const reader = new FileReader();

            // Set up the FileReader onload event to display the image preview
          
          reader.onload = function (e) {
                // Set the src attribute of the image preview to the result of FileReader
                imagePreview.src = e.target.result;
            };

            // Read the selected file as Data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, hide the image preview container
            imagePreview.style.display = 'none';
        }
    }
</script>
</body>
</html>


