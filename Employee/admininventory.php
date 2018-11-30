<?php
require('addrec.php');

$FirstName = $_POST['fname'];
$LastName = $_POST['lname'];
$Email = $_POST['email'];
$Password = $_POST['pass'];
$uname = $_POST['uname'];

$sql = 'INSERT INTO inventory (prodid, prodname, uprice, supid, prodq)
VALUES ("' . mysqli_real_escape_string($conn, $FirstName) . '", 
"' . mysqli_real_escape_string($conn, $LastName) . '",
"' . mysqli_real_escape_string($conn, $Email) . '",
"' . mysqli_real_escape_string($conn, $uname) . '",
"' . mysqli_real_escape_string($conn, $Password) . '")';


if(mysqli_query($conn, $sql)) {
	echo  "<script>alert('New product added successfully!');</script>";
	header("refresh: 0; url = http://localhost/notification/inventoryadmin.php");
	} else { 
	die("Error: " . mysqli_error($conn));
	header("refresh: 5");
}

echo "test";




	
	
?>