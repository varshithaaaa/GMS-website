<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gms");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "Team updated."; // Update message

if(isset($_POST['submit'])) {
    $team_id = $_POST['team_id']; // Retrieve team_id from form submission
    $supervisor = $_POST['supervisor'];
    $location = $_POST['location'];
    $worker = $_POST['worker'];
    
    // Update query
    $sql = "UPDATE team SET name = '$supervisor', location = '$location', workers = '$worker' WHERE team_id = $team_id";

    if (mysqli_query($conn, $sql)) {
        // Query executed successfully
        $redirect_page = "assignloc.php";
        echo "<script>alert('$message'); window.location.href = '$redirect_page';</script>";
    } else {
        // Error occurred
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
