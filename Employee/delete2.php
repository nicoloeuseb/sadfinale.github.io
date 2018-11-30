<?php 


$connect = mysqli_connect("localhost","root","","sad");

$qty=$_POST['quantity'];
$pid=$_POST['prodid'];
$cid=$_POST['cid'];

echo $qty;
echo '_';
echo $pid;
echo '_';
echo $cid;

$query="DELETE FROM orders WHERE  id=$cid";
mysqli_query($connect,$query);

header('location:ordered.php');


?>