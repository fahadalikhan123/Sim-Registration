<?php
session_start();
$current = $_SESSION['username'];

include 'database_configuration.php';
$code = "ID:";
$r=rand(10000000,90000000);
$id = "$code$r";

$file=$_FILES['image']['tmp_name'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name= addslashes($_FILES['image']['name']);
			
move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
		
$location ="photos/" . $_FILES["image"]["name"];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$bday = $_POST['bday'];
$phone = $_POST['phonenumber'];
date_default_timezone_set('Africa/Nairobi');
$date = date('jS  F Y');

$sql = "INSERT INTO registration (regstrationid, firstname, middlename, lastname, address, birthday, gender, phonenumber, photo, signature, date)
VALUES ('$id', '$fname', '$mname', '$lname', '$address', '$bday', '$gender', '$phone', '$location', '$current', '$date')";

if ($conn->query($sql) === TRUE) {
header("location:standard_user.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>