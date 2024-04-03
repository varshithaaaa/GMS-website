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

      section {
                  margin-bottom: 30px;
                  padding: 20px;
                  border: 1px solid #ddd;
                  background-color: white;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
              }
      section h2{
        text-align: center;
      }
      /* ... Your existing CSS styles ... */

      .employee-table {
        margin-top: 20px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      table, th, td {
        border: 1px solid #ccc;
      }

      th, td {
        padding: 10px;
        text-align: left;
      }

      th {
        background-color: #f0f0f0;
      }
      .highlight {
                  background-color: #f0f0f0 ;
                  font-weight: bold;
              }

      a{
        text-decoration: none;
        color: white;
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
        <li><a href="addemp.php"style="text-decoration:none;">ADD USERS</a></li>
        <li><a href="profile.php"style="text-decoration:none;">PROFILE</a></li>
        <li><a href="logout.php"style="text-decoration:none;">LOG OUT</a></li>
      </ul>
    </nav>
  </header>
  
<div class="employee-table">
  <!-- <button style="margin-left: 7px;
    width: 79px;
    height: 32px;
    background-color: #53c5bc;"><a href="adashboard.php">Back</a></button> -->
  <div class="search-bar">
            <span class="search-icon" style="margin-left: 1122px;">&#128269;</span>
            <input type="text" id="search-input" class="search-input" placeholder="Search...">
        </div>
        <br>
        <div id="content">
            <table>
              <form action="form.php" method="post"></form>
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Mob.No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$conn = mysqli_connect("localhost", "root","","gms");

  $sql="SELECT  * FROM USER" ;
    $data = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($data);

                   $s_id = 1 ;
                   while ($row = mysqli_fetch_assoc($data)) {
    echo "<tr>";
    echo "<td>".$s_id."</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['mobile_no'] . "</td>";
    $s_id++;
    $status = $row['status'];
    if ($status === 'Active') {
        echo "<td>";
        echo "<form method='POST' class='status-form'>";
        echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='Deactive'>";
        echo "<input type='submit' value='Deactivate'>";
        echo "</form>";
        echo "</td>";
    } else {
        echo "<td>";
        echo "<form method='POST' class='status-form'>";
        echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='Active'>";
        echo "<input type='submit' value='Activate'>";
        echo "</form>";
        echo "</td>";
    }

    echo "</tr>";
}

// Process the form submission to update the status
// Process the form submission to update the status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['action'])) {
    $userId = $_POST['user_id'];
    $action = $_POST['action'];

    // Perform the status update based on the submitted form data
    // You should replace this with your actual database update logic
    $updateQuery = "UPDATE user SET status = '$action' WHERE id = $userId";
    $result = mysqli_query($conn, $updateQuery);

    // Check if the update was successful
    if ($result) {
        $response = array('status' => true, 'message' => 'Status updated successfully');
    } else {
        $response = array('status' => false, 'message' => 'Failed to update status: ' . mysqli_error($conn));
    }

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); // Stop further execution

    }

?>
                </tbody>
            </table>
        </div>
    </div>
<!-- Add this script in your HTML file -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to handle form submission asynchronously
        function handleFormSubmit(form) {
            // Serialize form data
            var formData = new FormData(form);

            // Send AJAX request
            fetch(form.action, {
                method: form.method,
                body: formData,
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    // Handle the response from the server
                    if (data.status) {
                        // Optionally, update the UI or display a success message
                        console.log("Status updated successfully");
                    } else {
                        console.error("Failed to update status: " + data.message);
                    }
                })
                .catch(function (error) {
                    console.error("Error during AJAX request: " + error.message);
                });
        }

        // Attach a submit event listener to all forms with class 'status-form'
        var statusForms = document.querySelectorAll('.status-form');
        statusForms.forEach(function (form) {
            form.addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Call the function to handle form submission asynchronously
                handleFormSubmit(form);
            });
        });
    });
</script>

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
