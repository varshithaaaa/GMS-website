<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gms");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "Tools updated."; // Update message

if(isset($_POST['submit'])) {
    // Retrieve tool_id from form submission
    $tool_id = isset($_POST['tool_id']) ? $_POST['tool_id'] : null;
    $tool_name = $_POST['tool_name'];
    $quantity = $_POST['quantity'];
    
    // File upload handling
    $image = $_FILES['image']['name']; // Retrieve image name
    $target_dir = ""; // Directory where the file will be saved
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // File is an image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File uploaded successfully
            // Update query
            $sql = "UPDATE tool SET tool_name = '$tool_name', quantity = '$quantity', image = '$image' WHERE tool_id = $tool_id";

            if (mysqli_query($conn, $sql)) {
                // Query executed successfully
                $redirect_page = "equipment.php";
                echo "<script>alert('$message'); window.location.href = '$redirect_page';</script>";
            } else {
                // Error occurred
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Close connection
mysqli_close($conn);
?>
