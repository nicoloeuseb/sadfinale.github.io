<?php
session_start();
$link = mysqli_connect('localhost','root','','sad');

	$SupplierID=$_POST['SupplierID'];


if(isset($_POST['delete'])){
    $qry="DELETE FROM supplier WHERE '$SupplierID'=SupplierID";
    mysqli_query($link,$qry) or die("query failed". mysqli_error($link));
     //echo "<script>alert('Successfully Deleted!');</script>";
	 echo "<script>location.href='http://localhost/sadfinal/supply/index.php'</script>";
    mysqli_close($link);
}
?>