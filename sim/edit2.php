<?php
include 'database_configuration.php';
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$bday = $_POST['bday'];
$phone = $_POST['phonenumber'];
$id = $_POST['id'];


$sql = "UPDATE registration SET firstname='$fname', middlename='$mname', lastname='$lname', address='$address', birthday='$bday', phonenumber='$phone'  WHERE regstrationid = '$id'";

if ($conn->query($sql) === TRUE) {
 header("location:administrator.php");
} else {
   echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
