<?php
// Place the PHP code block handling form submission at the top of the file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['action'])) {
  // Get the user ID and action from the form
  $userId = $_POST['user_id'];
  $action = $_POST['action'];

  // Here you should perform the database update based on the submitted data
  // Make sure to replace the following lines with your actual database update logic
  // Establish a database connection (replace these variables with your actual database credentials)
  $conn = mysqli_connect("localhost", "root","","gms");

  // Check the database connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Perform the database update
  $updateQuery = "UPDATE user SET status = '$action' WHERE id = $userId";
  $result = mysqli_query($conn, $updateQuery);

  // Check if the update was successful
  if ($result) {
      // If successful, send a JSON response with a success message
      $response = array('status' => true, 'message' => 'Status updated successfully');
  } else {
      // If failed, send a JSON response with an error message
      $response = array('status' => false, 'message' => 'Failed to update status: ' . mysqli_error($conn));
  }

  // Close the database connection
  mysqli_close($conn);

  // Return the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
  exit(); // Stop further execution
}

// Now, the remaining HTML content follows
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

    /* Style for the activate button */
    .activate-btn {
      background-color: #4CAF50; /* Green */
      color: white;
      border: none;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 2px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 5px;
    }

    /* Change background color on hover */
    .activate-btn:hover {
      background-color: #45a049;
    }

    /* Style for the deactivate button */
    .deactivate-btn {
      background-color: #f44336; /* Red */
      color: white;
      border: none;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 2px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 5px;
    }

    /* Change background color on hover */
    .deactivate-btn:hover {
      background-color: #db4436;
    }
  </style>
</head>
<body>
  <header>
    <img src="images/icon (1).svg" style="width: 83px; height: 77px; margin-left: 83px;">
    <nav>
      <ul>
        <li><a href="adashboard.php">HOME</a></li>
        <li><a href="addemp.php" style="text-decoration:none;">ADD USERS</a></li>
        <li><a href="profile.php" style="text-decoration:none;">PROFILE</a></li>
        <li><a href="logout.php" style="text-decoration:none;">LOG OUT</a></li>
      </ul>
    </nav>
  </header>
  
  <div class="employee-table">
    <div class="search-bar">
      <span class="search-icon" style="margin-left: 1122px;">&#128269;</span>
      <input type="text" id="search-input" class="search-input" placeholder="Search...">
    </div>
    <br>
    <div id="content">
      <table>
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
          $conn = mysqli_connect("localhost", "root", "", "gms");
          $sql = "SELECT  * FROM USER";
          $data = mysqli_query($conn, $sql);
          $s_id = 1;

          while ($row = mysqli_fetch_assoc($data)) {
            echo "<tr>";
            echo "<td>" . $s_id . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>" . $row['mobile_no'] . "</td>";
            $s_id++;
            $status = $row['status'];
            echo "<td>";
            echo "<form method='POST' class='status-form'>";
            echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
            if ($status === 'Active') {
              echo "<input type='hidden' name='action' value='Deactive'>";
              echo "<button type='button' class='deactivate-btn' onclick='submitForm(this.parentNode)'>Deactivate</button>";
            } else {
              echo "<input type='hidden' name='action' value='Active'>";
              echo "<button type='button' class='activate-btn' onclick='submitForm(this.parentNode)'>Activate</button>";
            }
            echo "</form>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function submitForm(form) {
      const formData = new FormData(form);

      // Send AJAX request
      fetch('', {
          method: 'POST',
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          // Handle the response from the server
          if (data.status) {
            // Optionally, update the UI or display a success message
            console.log("Status updated successfully");
            // Reload the page to reflect the changes
            window.location.reload();
          } else {
            console.error("Failed to update status: " + data.message);
          }
        })
        .catch(error => {
          console.error("Error during AJAX request: " + error.message);
        });
    }
  </script>

<script>
        document.addEventListener("DOMContentLoaded", function () {
          const searchInput = document.getElementById("search-input");
          const rows = document.querySelectorAll("#content tbody tr");

          searchInput.addEventListener("keyup", function (event) {
            const searchText = event.target.value.toLowerCase();
            rows.forEach(row => {
              const cells = row.querySelectorAll("td");
              let found = false;
              cells.forEach(cell => {
                const text = cell.textContent.toLowerCase();
                if (text.includes(searchText)) {
                  found = true;
                }
              });
              if (found) {
                row.style.display = "";
              } else {
                row.style.display = "none";
              }
            });
          });
        });
      </script>
    </body>
  </html>

