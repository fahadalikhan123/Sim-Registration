<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>SIRES | Announcements</title>
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
<h2>Announcements</h2>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-red">Add Announcement</button><br><br>

 <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-8">
      <header class="w3-container w3-red">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-closebtn">&times;</span>
        <h2>Add Announcement</h2>
      </header>
      <div class="w3-container">
       <form action="add_announcement.php" method="POST">
      <label><b>Subject</b></label>
    <input type="text" placeholder="Enter Subject" name="subject" required>

    <label><b>Description</b></label>
    <textarea name="description" placeholder="Enter Description" required></textarea>

    <button type="submit" class="w3-btn w3-red">Add Announcement</button>

       </form>
      </div>
      <footer class="w3-container w3-red">
       <h2>SIRES</h2>
      </footer>
    </div>
  </div>

  <table class="w3-table-all w3-large">
    <tr>
      <th>Subject</th>
      <th>Description</th>
       <th>Date</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
<?php
include 'database_configuration.php';

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["subject"]. "</td><td>" . $row["description"]. "</td><td>" . $row["date"];
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-blue" href="annc_update.php?id='.$row['id'].'">Update</a>';
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-red" href="delete_annc.php?id='.$row['id'].'">Delete</a>';
    }
} else {
    print '
</table><div class="w3-panel w3-leftbar w3-light-grey">
  <p class="w3-xlarge w3-serif">
  <i><b>0</b> Announcement(s) found on DataBase</i></p>
</div>';
}
$conn->close();
?>
  </table>


   