<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>garden management system</title>
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
  color: black;
}
section {
  margin-bottom: 30px;
    padding: 37px 0px;
    border: 1px solid #ddd;
    background-color: #53c5bc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    width: 463px;
    margin-left: 469px;
    text-align: center;
    font-size: smaller;
}
        
section h2{
  text-align: center;
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
        <li><a href="index.html">LOG OUT</a></li>
        <li><a href="mbell.php"><img src="bell.svg"></a></li>
      </ul>
    </nav>
  </header>
  <br><br>
  <section id="user-management">
    <h2><a href="assignloc.php">Assign Location</h2>
  </section>
  <section id="places-management">
    <h2><a href="mplaces.php">Places</h2>
  </section>
  <section id="task-reports">
    <h2><a href="equipment.php" >Equipment and Materials Management</h2>
  </section>
  <section id="task-reports">
    <h2><a href="leaderboard.php">LeaderBoard</h2>
  </section>
</body>
</html>