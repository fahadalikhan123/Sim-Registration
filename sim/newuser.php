<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>SIRES | New User</title>
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
<h2>Register New User</h2>

<?php
if(isset($_POST['submit'])) {
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$myusername = $_POST['username'];
$role = $_POST['role'];

include 'database_configuration.php';

$sql = "INSERT INTO users (fullname, gender, address, username, role)
VALUES ('$fullname', '$gender', '$address', '$myusername', '$role')";

if ($conn->query($sql) === TRUE) {
 print '
  <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p>New user has been registered...the default password is set to 123456</p>
  </div>
';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<form action="newuser.php" method="POST">
<br>
  <p>
  <label>Full Name</label>
  <input  name="fullname" type="text"  placeholder="Enter Full Name" required></p>

  <p>
  <label>Gender</label>
  <select  name="gender"  required><option>Male</option><option>Female</option></select></p>
 
<label>Address</label>
  <input  name="address" type="text" name="address" placeholder="Enter Address" required></p>
 
<label>Username</label>
  <input  name="username" type="text"  placeholder="Enter Username" required></p>

 <p>
  <label>Role</label>
  <select name="role"  required><option>Admin</option><option>Standard User</option></select></p>
<button type="submit" name="submit" class="w3-btn w3-red">Register User</button>
</form>
   
<br><br>
<?php
  
?>
   