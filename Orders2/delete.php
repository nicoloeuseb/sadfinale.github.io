<?php 


$connect = mysqli_connect("localhost","root","","sad");

$qty=$_POST['quantity'];
$pid=$_POST['prodid'];
$id=$_POST['id'];

echo $qty;
echo '_';
echo $pid;
echo '_';
echo $id;

$query="DELETE FROM orders WHERE quantity=$qty and prodid=$pid and id=$id";
mysqli_query($connect,$query) or die("Error: " . mysqli_error($connect));

$query2="UPDATE inventory SET prodq= (prodq + $qty) WHERE prodid=$pid";
mysqli_query($connect,$query2) or die("Error: " . mysqli_error($connect));

header('location:index.php');


?>