

<?php
$conn = mysqli_connect("localhost", "root", "", "gms");
$message = "Place added.";

if(isset($_POST['submit'])){
    $place = $_POST['place'];
    
    // File upload handling
    $targetDirectory = ""; // Directory where the uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]); // Path to the uploaded file
    
    // Check if file has been uploaded
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // File uploaded successfully, now insert place and file path into database
        $sql = "INSERT INTO places(place_name, image_path) VALUES ('$place', '$targetFile')";
        $data = mysqli_query($conn, $sql);
        
        if($data) {
            $redirect_page = "places.php";
            echo "<script>alert('$message'); window.location.href = '$redirect_page';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              color: #333;
              font-weight: bold;
            }

            a {
              color: white;
              text-decoration: none;
            }

            form h2 {
      margin-bottom: 20px;
    }

            button {
      background-color: #53c5bc;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

            form {
      width: 50%;
      margin: 50px auto; /* Center the form horizontally */
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

  </style>
</head>
<body>
  <header>
    <img src="images/icon (1).svg" style="width: 83px; height: 77px; margin-left: 83px;">
    <nav>
      <ul>
        <li><a href="addemp.php">ADD USERS</a></li>
        <li><a href="profile.php">PROFILE</a></li>
        <li><a href="logout.php">LOG OUT</a></li>
      </ul>
    </nav>
  </header>
  <center>
    <span class="border-0">
    <form action="" method="post" enctype="multipart/form-data">
    <h2>New Place</h2><br>
    <div class="form-group">
        <label>Place Name:</label>
        <input type="text" name="place" required> <br><br>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required> <br><br>
        <button type="submit" name="submit">Add Place</button> <!-- Changed type to submit -->
    </div>
</form>

    </span>
  </center>
</body>
</html>
