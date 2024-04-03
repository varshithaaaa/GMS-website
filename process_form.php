
<?php
session_start();
$conn = mysqli_connect("localhost", "root","","gms");
$message = "Work Added!";
if(isset($_POST['submit'])){
 $manager=$_SESSION['name'];
 $supervisor=$_POST['supervisor'];
 $location=$_POST['location'];
 $worker=$_POST['worker'];
  
  
  //$worker=$_POST['worker'];
 
/* echo $supervisor;
 echo $location;
 echo $worker;
}
  */ 
//if (isset($_POST['worker']) && is_array($_POST['worker'])) {
//  foreach ($_POST['worker'] as $worker) {
$sql="INSERT INTO team(manager, name, location, workers) VALUES ('$manager','$supervisor','$location','$worker')";
//$sql="INSERT INTO team(manager, name) VALUES ('$manager','$supervisor')";

  $data = mysqli_query($conn,$sql);
  $redirect_page = "assignloc.php";
  echo "<script>alert('$message'); window.location.href = '$redirect_page';</script>";
 // echo "Data inserted sucessfully";
//}
  //if($data)
  //{
   // echo "Data inserted sucessfully";
    //header("location: mdashboard.php");
  //}
}
//}
?>