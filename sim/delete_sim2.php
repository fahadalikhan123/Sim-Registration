<?php
include 'database_configuration.php';
$id = $_GET['id'];

$sql = "SELECT * FROM registration WHERE regstrationid ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $profile = $row['photo'];
       
if (!unlink($profile))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }

    }
} else {
    echo "0 results";
}

$sql = "DELETE FROM registration WHERE regstrationid ='$id'";

if ($conn->query($sql) === TRUE) {
 header("location:administrator.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>