<?php
// remove_row.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tool_id'])) {
    $conn = mysqli_connect("localhost", "root", "", "gms");

    $tool_id = mysqli_real_escape_string($conn, $_POST['tool_id']);

    $sql = "DELETE FROM tool WHERE tool_id = '$tool_id'";
    $result = mysqli_query($conn, $sql);

    // Return a response (you can customize this based on your needs)
    if ($result) {
        echo "Row removed successfully";
    } else {
        echo "Error removing row: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
