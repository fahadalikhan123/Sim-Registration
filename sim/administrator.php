<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>SIRES | Registered Sim Cards</title>
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
<h2>Registered Sim Cards</h2>
<table class="w3-table-all">
    <tr>
      <th>SIM ID</th>
      <th>FIRSTNAME</th>
      <th>MIDDLENAME</th>
      <th>LASTNAME</th>
      <th>ADDRESS</th>
      <th>PHONE NUMBER</th>
      <th>VIEW</th>
      <th>EDIT</th>
      <th>DELETE</th>
    </tr>
<?php
  include 'database_configuration.php';

$sql = "SELECT * from registration ORDER BY date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["regstrationid"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["middlename"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["phonenumber"];
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-teal" href="sim_view2.php?id='.$row['regstrationid'].'">View</a>';
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-blue" href="edit_sim2.php?id='.$row['regstrationid'].'">Edit</a>';
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-red" href="delete_sim2.php?id='.$row['regstrationid'].'">Delete</a>';
    }
} else {
    print '
</table><div class="w3-panel w3-leftbar w3-light-grey">
  <p class="w3-xlarge w3-serif">
  <i><b>0</b> Record(s) found on DataBase</i></p>
</div>';
}
$conn->close();
?>
   