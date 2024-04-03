<?php
session_start();
?>
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
a{
  text-decoration:none;
  color: black;
}
nav a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

section {
            margin-bottom: 30px;
            padding: 25px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            width:60%;
        }
section h2{
  text-align: center;
}
.id1{
  padding-top:20px;
}
.id1 ,.id2 ,.id3{
  display:flex;
  justify-content:  center;

  width:100%;
}

.ag-format-container {
  width: 1142px;
  margin: 0 auto;
}


body {
  background-color: #CCCCFF;
}
.ag-courses_box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;

  padding: 50px 0;
}
.ag-courses_item {
  -ms-flex-preferred-size: calc(33.33333% - 30px);
  flex-basis: calc(33.33333% - 30px);

  margin: 0 15px 30px;

  overflow: hidden;

  border-radius: 28px;
}
.ag-courses-item_link {
  display: block;
  padding: 30px 20px;
  background-color: grey;

  overflow: hidden;

  position: relative;
}
.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
  text-decoration: none;
  color: #FFF;
}
.ag-courses-item_link:hover .ag-courses-item_bg {
  -webkit-transform: scale(10);
  -ms-transform: scale(10);
  transform: scale(10);
}
.ag-courses-item_title {
  min-height: 53px;
    margin: 0 0 25px;
    overflow: hidden;
    font-weight: bold;
    font-size: 30px;
    color: #FFF;
    z-index: 2;
    position: relative;
    text-align: center;
    margin-top: 48px;
}
.ag-courses-item_date-box {
  font-size: 18px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date {
  font-weight: bold;
  color: #f9b234;

  -webkit-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease
}
.ag-courses-item_bg {
  height: 128px;
  width: 128px;
  background-color: #53c5bc;

  z-index: 1;
  position: absolute;
  top: -75px;
  right: -75px;

  border-radius: 50%;

  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
}
.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
  background-color: #53c5bc;
}
.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
  background-color: #53c5bc;
}
.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
  background-color: #53c5bc;
}
.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
  background-color: #53c5bc;
}
.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
  background-color: #53c5bc;
}



@media only screen and (max-width: 979px) {
  .ag-courses_item {
    -ms-flex-preferred-size: calc(50% - 30px);
    flex-basis: calc(50% - 30px);
  }
  .ag-courses-item_title {
    font-size: 24px;
  }
}

@media only screen and (max-width: 767px) {
  .ag-format-container {
    width: 96%;
  }

}
@media only screen and (max-width: 639px) {
  .ag-courses_item {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
  }
  .ag-courses-item_title {
    min-height: 72px;
    line-height: 1;

    font-size: 24px;
  }
  .ag-courses-item_link {
    padding: 22px 40px;
  }
  .ag-courses-item_date-box {
    font-size: 16px;
  }
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
      
      <li><a href="addemp.php">ADD USERS</a></li>
      <li><a href="profile.php">PROFILE</a></li>
      <li><a href="logout.php">LOG OUT</a></li>
    </ul>
  </nav>
  </header>
  
  <!-- <div class="id1">
  <section id="user-management">
    <h2><a href="emp.php" >Employees</h2>
   
  </section>
  </div>
  <div class="id2">
  <section id="places-management">
    <h2><a href="places.php" >Places</h2>
  </section>
</div>
  <div class="id3">
  <section id="task-reports">
    <h2><a href="reports.php" >Task Reports</h2>
    
  </section>
</div> -->
<br><br><br><br><br>
<div class="ag-format-container">
  <div class="ag-courses_box">
    <div class="ag-courses_item">
      <a href="emp.php" class="ag-courses-item_link">
        <div class="ag-courses-item_bg"></div>

        <div class="ag-courses-item_title">
         Employees
        </div>

        <div class="ag-courses-item_date-box">
    
          <span class="ag-courses-item_date">
           
          </span>
        </div>
      </a>
    </div>
    <div class="ag-courses_item">
      <a href="places.php" class="ag-courses-item_link">
        <div class="ag-courses-item_bg"></div>

        <div class="ag-courses-item_title">
          Places
        </div>

        <div class="ag-courses-item_date-box">
         
          <span class="ag-courses-item_date">
            
          </span>
        </div>
      </a>
    </div>
    <div class="ag-courses_item">
      <a href="reports.php" class="ag-courses-item_link">
        <div class="ag-courses-item_bg"></div>

        <div class="ag-courses-item_title">
         Task Reports
        </div>

        <div class="ag-courses-item_date-box">
          
          <span class="ag-courses-item_date">
          
          </span>
        </div>
      </a>
    </div>

    

  </div>
</div>
</body>
</html>

