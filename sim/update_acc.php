<?php
include 'database_configuration.php';

$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$id = $_POST['id'];

$sql = "UPDATE users SET fullname ='$fullname', gender='$gender', address='$address', username='$myusername', password='$mypassword' WHERE userid='$id'";

if ($conn->query($sql) === TRUE) {
header("location:logout.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>