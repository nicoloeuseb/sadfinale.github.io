<?php 


$connect = mysqli_connect("localhost","root","","sad");

$date=$_POST['date'];
$id=$_POST['id'];

echo $id;
echo '_';
echo $date;


$query="DELETE FROM orders  WHERE id=$id and DATE_FORMAT(time_stamp, '%Y-%m-%d') = '$date' ";
mysqli_query($connect,$query) or die("Error: " . mysqli_error($connect));

header('location:index2.php');


?>