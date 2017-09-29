<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>SIRES | Password Update</title>
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
    <li><a href="standard_user.php">Register Sim</a></li>
    <li><a href="viewannouncements.php">Announcements</a></li>
    <li><a href="explore.php">Explore</a></li>
    <li><a href="account.php">Password Update</a></li>
 
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2>Update Password</h2>
<?php
if(isset($_POST['submit'])) {
include 'database_configuration.php';

$cp = $_POST['cpass'];
$np = $_POST['npass'];
$user = $_POST['myuser'];

$sql = "SELECT * FROM users where username ='$user' and password='$cp'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       
$sql = "UPDATE users SET password ='$np' WHERE username ='$user'";

if ($conn->query($sql) === TRUE) {
   header("location:logout.php");
} else {
    echo "Error updating record: " . $conn->error;
}




    }
} else {
    print '
  <div class="w3-panel w3-red">
    <h3>Error!</h3>
    <p>You entered incorrect password!!!</p>
  </div>
';
}
$conn->close();
}
?>
 <form action="account.php" method="POST">
<br>
  <p>
  <label>Current Password</label>
  <input  name="cpass" type="password"  placeholder="Enter Current Password" required></p>

  <p>
  <label>New Password</label>

   <input  name="npass" type="password"  placeholder="Enter New Password" required></p>
<input type="hidden" name="myuser" value="<?php echo"$current"; ?>" >
<button type="submit" name="submit" class="w3-btn w3-red">Update Password</button>
</form>
   