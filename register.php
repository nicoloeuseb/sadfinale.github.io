<?php
require('connect.php');

$FirstName = $_POST['fname'];
$LastName = $_POST['lname'];
$Email = $_POST['email'];
$Password = $_POST['pass'];
$ContactNum = $_POST['num'];
$uname = $_POST['uname'];
$Address = $_POST['addr'];
$sql = 'INSERT INTO customer (fname, lname, email, user,pass, Address,contactNum)
VALUES ("' . mysqli_real_escape_string($conn, $FirstName) . '", 
"' . mysqli_real_escape_string($conn, $LastName) . '",
"' . mysqli_real_escape_string($conn, $Email) . '",
"' . mysqli_real_escape_string($conn, $uname) . '",
"' . mysqli_real_escape_string($conn, $Password) . '",
"' . mysqli_real_escape_string($conn, $ContactNum) . '",
"' . mysqli_real_escape_string($conn, $Address) . '")';


if(mysqli_query($conn, $sql)) {
	
	echo "<script>alert('New account created successfully');</script>";
	header("refresh: 1; url = http://localhost/SADfinal/SadLoginCustomer.html");
	} else { 
	die("Error: " . mysqli_error($conn));
	header("refresh: 5");
}

echo "test";




	
	
?>