<!DOCTYPE html>
<html>
<title>SIRES | User Login</title>
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

<center>
<h2>Welcome to SIRES, login to your account</h2>

<form action="index.php" method="POST">
  <div class="imgcontainer">
    <img src="images/logo.jpg" width="150" >
  </div>
</center>
  <div class="container">

<?php
  error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit'])) {
include 'database_configuration.php';

$myuser = $_POST['username'];
$mypass = $_POST['password'];

$sql = "SELECT * FROM users where username='$myuser' and password='$mypass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $role = $row['role'];
if ($role == "Admin") {
setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['username'] = $myuser;
header("location:administrator.php?user=$myuser");
} else {
setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['username'] = $myuser;
header("location:standard_user.php?user=$myuser");
}
    }
} else {
    print '
  <div class="w3-panel w3-red">
    <h3>Error!</h3>
    <p>Account not found in DataBase.</p>
  </div>
';
}
$conn->close();

}
?>
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit" class="w3-btn w3-red">Log me in</button>

</form>

<br />
<br />
<footer>SIRES 
<style>

.background-color: #f44336;
</style> 
</footer>
