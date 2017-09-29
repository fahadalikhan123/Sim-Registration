<?php
session_start();
$current = $_SESSION['username'];

$id = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM registration where regstrationid = '$id'";
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
       $photo = $row['photo'];
       $date = $row['date'];
       $signature = $row['signature'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>SIRES | View Simcard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<style>
input[type=text], input[type=password] {
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
<h2>View Simcard</h2>
<h3 style="font-family:Courier New;"><?php echo"$id"; ?></h3>
   <ul class="w3-ul w3-card-4">
    <li class="w3-padding-16">
      <img src="<?php echo"$photo"; ?>" class="w3-left  w3-margin-right" style="width:150px">
      <span class="w3-large"><?php echo"$fname $mname $lname"; ?></span><br>
      <span>Address: <?php echo"$address"; ?></span><br>
<span>Phone Number: <?php echo"$phone"; ?></span><br>
<span>Birthday: <?php echo"$bday"; ?></span><br>
<span>Gender: <?php echo"$gender"; ?></span><br>
<span>Registration Date: <?php echo"$date"; ?>, <?php echo"$signature"; ?></span><br><br>
    </li>
