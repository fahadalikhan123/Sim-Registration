<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>SIRES | SIM Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<link rel="stylesheet" href="jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 
<style>
input[type=text], input[type=password] , input[type=number]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
</style>
<body>
<div class="w3-container w3-red">
  <h1>SIRES</h1>
</div>
  <ul class="w3-navbar w3-light-grey">
    <li><a href="standard_user.php">Register Sim</a></li>
    <li><a href="viewannouncements.php">Announcements</a></li>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="account.php">Password Update</a></li>
 
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2>SIM Card Registration</h2>
<form action="addsim.php" method="POST" enctype="multipart/form-data" name="addroom">
 <label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle Name" name="mname" required>

    <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>

    <label><b>Gender</b></label>
    <select name="gender" required><option>Male</option><option>Female</option></select>

    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

<label><b>Birthday</b></label>
<input type="text" id="datepicker" name="bday" placeholder="11/03/2016" required>

    <label><b>Phone Number</b></label>
    <input type="number" placeholder="546466464" name="phonenumber" required>


    <label><b>Image</b></label>
   <input type="file" name="image" required>
<br>
    <button type="submit" class="w3-btn w3-red">Register Simcard</button>
<br><br>
<?php
  
?>
   