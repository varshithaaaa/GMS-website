<?php
// remove_row.php

$team_id = isset($_GET['team_id']) ? $_GET['team_id'] : null;

$conn = mysqli_connect("localhost", "root", "", "gms");
$sq = "SELECT name FROM user  where role = 'supervisor' ";
$dat = mysqli_query($conn, $sq);

$sql="SELECT  * FROM team" ;
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

              a {
                text-decoration: none;
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
              header img {
                margin-right: 10px;
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
                font-size: 16px;
                font-weight: bold;
              }

              nav a:hover {
                color: #e0c2b2;
              }
              a{
                text-decoration: none;
                color: white;
              }
              .assign-form {
                width: 42%;
                margin: 20px auto;
                background-color: #53c5bc;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              }
              .employee-table{
                width: 83%;
              }
              .form-group {
                margin-bottom: 20px;
              }

              label {
                display: flex;
                font-weight: bold;
              }

              select,
              input[type="checkbox"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
              }

              input[type="submit"] {
                background-color: #e0c2b2;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
              }

              

              /* Style for the worker checkboxes */
              .worker-list {
                display: flex;
                flex-wrap: wrap;
              }
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
    <div class="assign-form">
      <form action="update_form.php" method="post">

      <input type="hidden" name="team_id" value="<?php echo $team_id; ?>">




                            <div class="form-group">
                        <label for="location-input">Select Supervisor:</label>
                        <select name='supervisor'>
                            <?php
                            // Check if team_id is provided in the URL
                            if (isset($_GET['team_id'])) {
                                $team_id = $_GET['team_id'];

                                // Connect to your database
                                $conn = mysqli_connect("localhost", "root", "", "gms");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Retrieve team information based on the provided team_id
                                $query = "SELECT * FROM team WHERE team_id = $team_id";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $supervisors = explode(',', $row['name']); // Assuming workers are stored as comma-separated values in the database
                                    foreach ($supervisors as $supervisor) {
                                        echo '<option>' . $supervisor . '</option>';
                                    }
                                } else {
                                    echo "No workers found for this team.";
                                }

                                // Close the database connection
                                mysqli_close($conn);
                            } else {
                                echo "Team ID not provided!";
                            }
                            ?>
                            <?php
                            // Connect to your database
                            $conn = mysqli_connect("localhost", "root", "", "gms");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetch all workers
                            $sqlquery = "SELECT name FROM user WHERE role='Supervisor'";
                            $dat= mysqli_query($conn, $sqlquery);

                            // Output options for workers
                            while ($row = mysqli_fetch_assoc($dat)) {
                                echo '<option>' . $row['name'] . '</option>';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>

                        

                            <div class="form-group">
                        <label for="location-input">Select workers:</label>
                        <select name='worker'>
                            <?php
                            // Check if team_id is provided in the URL
                            if (isset($_GET['team_id'])) {
                                $team_id = $_GET['team_id'];

                                // Connect to your database
                                $conn = mysqli_connect("localhost", "root", "", "gms");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Retrieve team information based on the provided team_id
                                $query = "SELECT * FROM team WHERE team_id = $team_id";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $workers = explode(',', $row['workers']); // Assuming workers are stored as comma-separated values in the database
                                    foreach ($workers as $worker) {
                                        echo '<option>' . $worker . '</option>';
                                    }
                                } else {
                                    echo "No workers found for this team.";
                                }

                                // Close the database connection
                                mysqli_close($conn);
                            } else {
                                echo "Team ID not provided!";
                            }
                            ?>
                            <?php
                            // Connect to your database
                            $conn = mysqli_connect("localhost", "root", "", "gms");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetch all workers
                            $sqlquery = "SELECT name FROM user WHERE role='Worker'";
                            $dat= mysqli_query($conn, $sqlquery);

                            // Output options for workers
                            while ($row = mysqli_fetch_assoc($dat)) {
                                echo '<option>' . $row['name'] . '</option>';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="location-input">Assign Location:</label>
                        <select name='location'>
                            <?php
                            // Check if team_id is provided in the URL
                            if (isset($_GET['team_id'])) {
                                $team_id = $_GET['team_id'];

                                // Connect to your database
                                $conn = mysqli_connect("localhost", "root", "", "gms");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Retrieve team information based on the provided team_id
                                $query = "SELECT * FROM team WHERE team_id = $team_id";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $location = explode(',', $row['location']); // Assuming workers are stored as comma-separated values in the database
                                    foreach ($location as $location) {
                                        echo '<option>' . $location . '</option>';
                                    }
                                } else {
                                    echo "No workers found for this team.";
                                }

                                // Close the database connection
                                mysqli_close($conn);
                            } else {
                                echo "Team ID not provided!";
                            }
                            ?>
                            <?php
                            // Connect to your database
                            $conn = mysqli_connect("localhost", "root", "", "gms");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetch all workers
                            //$sqlquery = "SELECT location FROM user WHERE role='Worker'";
                            $sqlquery = "SELECT  place_name FROM places ";
                            $dat= mysqli_query($conn, $sqlquery);

                            // Output options for workers
                            while ($row = mysqli_fetch_assoc($dat)) {
                                echo '<option>' . $row['place_name'] . '</option>';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>


       

        <input type="submit" name="submit" value="submit">
        
      </form>
    </div>


<div class="employee-table">
  <button style="margin-left: -1063px !important;
  width: 79px;
    height: 32px;
    background-color: #53c5bc;"><a href="assignloc.php">Back</a></button>
        
        <br>
        <div id="content">
           <table id="content">
   
    
</table>

        </div>
    </div>
 </center>   

</body>
</html>



