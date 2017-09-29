<?php
session_start();
$current = $_SESSION['username'];

$myid = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM registration where regstrationid = '$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $fname = $row['firstname'];
       $mname = $row['middlename'];
       $lname = $row['lastname'];
       $address = $row['address'];
       $bday = $row['birthday'];
       $gender = $row['gender'];
       $phone = $row['phonenumber'];
       
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>SIRES | Edit Simcard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<style>
input[type=text], input[type=password], input[type=number] {
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
    <li><a href="administrator.php">Registerd Sims</a></li>
    <li><a href="newuser.php">Register User</a></li>
    <li><a href="announcements.php">Announcements</a></li>
    <li><a href="myaccount.php">Account Update</a></li>
    <li><a href="users.php">Customize Users</a></li>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2>Edit Simcard</h2>
<form action="edit2.php" method="POST" enctype="multipart/form-data" name="addroom">
 <label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" value="<?php echo"$fname"; ?>" name="fname" required>

    <label><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle Name" value="<?php echo"$mname"; ?>" name="mname" required>

    <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" value="<?php echo"$lname"; ?>" name="lname" required>

    <label><b>Gender</b></label>
    <input type="text" placeholder="Enter Gender" value="<?php echo"$gender"; ?>" name="gender">

    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" value="<?php echo"$address"; ?>"name="address" required>

<label><b>Birthday</b></label>
<input type="text" id="datepicker" name="bday" value="<?php echo"$bday"; ?>"placeholder="11/03/2016" required>

    <label><b>Phone Number</b></label>
    <input type="number" placeholder="546466464" value="<?php echo"$phone"; ?>" name="phonenumber" required>
    <input type="hidden" name="id" value="<?php echo"$myid"; ?>">
<br>
    <button type="submit" class="w3-btn w3-red">Update Simcard</button>
<br><br>
<?php
  
?>
   
