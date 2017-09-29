<?php
$servername = "localhost";
$username = "root";
$password = "fahadalikhan123";
$dbname = "airtel";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>