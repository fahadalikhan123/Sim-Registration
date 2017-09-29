<?php
session_start();
$current = $_SESSION['username'];
$id = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM announcements where id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       $subject = $row['subject'];
       $description = $row['description'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>SIRES | Announcemen Update</title>
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
<h2>Update Announcement</h2>
<form action="update.php" method="POST">
<br>
  <p>
  <label>Subject</label>
  <input  name="subject" type="text"  placeholder="Enter Subject" value="<?php echo"$subject"; ?>"required></p>
    <label><b>Description</b></label>
    <textarea name="description" placeholder="Enter Description"  required><?php echo"$description"; ?></textarea>
     <input type="hidden" name="id" value="<?php echo"$id"; ?>">
    <button type="submit" class="w3-btn w3-red">Update Announcement</button>

       </form>


   