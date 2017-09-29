<?php
include 'database_configuration.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE userid='$id'";

if ($conn->query($sql) === TRUE) {
header("location:users.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>