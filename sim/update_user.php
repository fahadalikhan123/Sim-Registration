<?php
session_start();
$current = $_SESSION['username'];

include 'database_configuration.php';
$cid = $_GET['id'];

$sql = "SELECT * FROM users where userid = '$cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
        $fullname = $row['fullname'];
        $gender = $row['gender'];
        $address = $row['address'];
        $myusername = $row['username'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>SIRES | Update User</title>
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

select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
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
<h2>Update User</h2>
<form action="update1.php" method="POST">
<br>
  <p>
  <label>Full Name</label>
  <input  name="fullname" type="text"  placeholder="Enter Full Name" value="<?php echo"$fullname"; ?>"required></p>
    <label><b>Gender</b></label>
  <input  name="gender" type="text"  placeholder="Enter Gender" value="<?php echo"$gender"; ?>"required></p>

    <label><b>Address</b></label>
  <input  name="address" type="text"  placeholder="Enter Address" value="<?php echo"$address"; ?>"required></p>

       <label><b>Username</b></label>
  <input  name="username" type="text"  placeholder="Enter Username" value="<?php echo"$myusername"; ?>"required></p>

<input type="hidden" name="id" value="<?php echo"$cid"; ?>">
    <button type="submit" class="w3-btn w3-red">Update User</button>
</form>