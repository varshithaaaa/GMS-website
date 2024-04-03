<?php
$conn = mysqli_connect("localhost", "root", "", "gms");
$sq = "SELECT name FROM user  where role = 'supervisor' ";
$dat = mysqli_query($conn, $sq);
?>
<?php
$conn = mysqli_connect("localhost", "root","","gms");

  $sql="SELECT  * FROM tool" ;
    $data = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Garden Management System</title>
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

    nav a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    a{
      text-decoration: none;
      color: white;
    }

    .issue-section {
      text-align: center;
      width: 43%;
      margin-bottom: 30px;
      padding: 5px;
      border: 1px solid #ddd;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Button styles */
    button {
        background-color: #53c5bc;
        color: #fff;
        padding: 8px 16px; /* Adjust padding as needed */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s; /* Add transition for smoother hover effect */
    }

    /* Hover effect */
    button:hover {
        background-color: #428b85; /* Darker shade of the original color */
    }

    .issue-section img {
      max-width: 100px; /* Set the maximum width for the image */
      max-height: 100px; /* Set the maximum height for the image */
      margin: 10px auto; /* Adjust margin for better spacing */
    }

    /* Styles for tables */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ccc;
      background-color: #53c5bc;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #fff;
    }

    .highlight {
      background-color: #f0f0f0 ;
      font-weight: bold;
    }

    /* Style for the search bar */
    .search-bar {
      width: 100%;
      position: relative;
      display: flex;
      align-items: center;
    }

    /* Style for the search icon */
    .search-icon {
      font-size: 20px; /* Adjust the size of the search icon */
      margin-right: 10px; /* Adjust the spacing between the icon and input */
      color: #333; /* Icon color */
    }

    /* Style for the search input */
    .search-input {
      padding: 10px; /* Adjust the padding inside the input */
      border: 1px solid #ccc; /* Border color */
      border-radius: 5px; /* Rounded corners */
      font-size: 16px; /* Adjust the font size */
      width: 200px; /* Adjust the width of the input */
      outline: none; /* Remove the outline when focused */
    }

    /* Style for the placeholder text inside the input */
    .search-input::placeholder {
      color: #999; /* Placeholder text color */
    }

    .worker-item {
      margin-right: 10px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
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
  <button type="submit" name="submit" style="margin-left: 21px; margin-top: 13px;"><a href="addequip.php">Add Asset</a></button>
  <button><a href="allotequip.php">Allot Asset</a></button>
    


<div class="employee-table">
  <button style="margin-left: -1063px !important;
  width: 79px;
    height: 32px;
    background-color: #53c5bc;"><a href="mdashboard.php">Back</a></button>
    
        <div class="search-bar">
            <span class="search-icon" style="margin-left: 910px;">&#128269;</span>
            <input type="text" id="search-input" class="search-input" placeholder="Search...">
        </div>
        <br>
        <div id="content">
           <table id="content">
    <thead>
        <tr>
            <th>Sl.No</th>
            <th>Image</th>
            <th>Asset Name</th>
            <th>Quantity</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($data)) {
            echo "<tr>";
            echo "<td>" . $row['tool_id'] . "</td>";
            echo "<td><img src='" . $row['image'] . "' alt='Image' style='width: 50px; height: 50px;'></td>";


            echo "<td>" . $row['tool_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
           
            echo "<td><button onclick=\"editRow('" . $row['tool_id'] . "', '" . $row['tool_name'] . "', '" . $row['quantity'] . "', '" . $row['image'] . "')\">Edit</button></td>";

            echo "<td><button onclick='removeRow(" . $row['tool_id'] . ")'>Remove</button></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script>
    function removeRow(tool_id) {
        // Confirm the deletion with the user
        if (confirm("Are you sure you want to remove this row?")) {
            // Send an AJAX request to delete the row
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page or update the table based on your requirements
                    location.reload();
                }
            };
            xhr.open("POST", "remove_tool.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("tool_id=" + tool_id);
        }
    }


    function editRow(toolId, tool_name, quantity, image) {
            // Redirect to edit page with parameters
            window.location.href = "edit_tool.php?tool_id=" + toolId + "&tool_name=" + tool_name + "&quantity=" + quantity + "&image=" + image;
        }
</script>

        </div>
    </div>
 </center>   
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search-input");
            const content = document.querySelectorAll("#content tbody tr");

            searchInput.addEventListener("input", function () {
                const query = searchInput.value.toLowerCase();

                // Loop through content and highlight matching items
                content.forEach((row) => {
                    const itemText = row.textContent.toLowerCase();
                    if (itemText.includes(query)) {
                        row.classList.add("highlight");
                    } else {
                        row.classList.remove("highlight");
                    }
                });
            });
        });
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search-input");
        const rows = document.querySelectorAll("#content tbody tr");

        searchInput.addEventListener("input", function () {
            const query = searchInput.value.toLowerCase();

            // Loop through rows and toggle visibility based on the search query
            rows.forEach((row) => {
                const itemText = row.textContent.toLowerCase();
                const isVisible = itemText.includes(query);
                row.style.display = isVisible ? "table-row" : "none";
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search-input");
        const rows = document.querySelectorAll("#content tbody tr");

        searchInput.addEventListener("input", function () {
            const query = searchInput.value.toLowerCase();

            // Loop through rows and toggle visibility based on the search query
            rows.forEach((row) => {
                const itemText = row.textContent.toLowerCase();
                const isVisible = itemText.includes(query);
                row.style.display = isVisible ? "table-row" : "none";
            });

            // Remove the "highlight" class if the search query is empty
            if (query === "") {
                rows.forEach((row) => {
                    row.classList.remove("highlight");
                });
            }
        });
    });
</script>
</body>
</html>
