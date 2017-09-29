<?php
include 'database_configuration.php';

$subject = $_POST['subject'];
$descrption = $_POST['description'];
date_default_timezone_set('Africa/Nairobi');
$dnt = date('l jS  F Y h:i:s A');

$sql = "INSERT INTO announcements (subject, description, date)
VALUES ('$subject', '$descrption', '$dnt')";

if ($conn->query($sql) === TRUE) {
header("location:announcements.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>