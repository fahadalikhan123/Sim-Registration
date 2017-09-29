<?php
include 'database_configuration.php';

$id = $_GET['id'];

$sql = "DELETE FROM announcements WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
header("location:announcements.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>