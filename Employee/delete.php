<?php
session_start();
$link = mysqli_connect('localhost','root','','sad');

	$id=$_POST['id'];


if(isset($_POST['delete'])){
    $qry="DELETE FROM employee WHERE '$id'=id";
    mysqli_query($link,$qry) or die("query failed". mysqli_error($link));
     echo "<script>alert('Successfully Deleted!');</script>";
		  echo "<script>location.href='http://localhost/SAD/index.php'</script>";
    mysqli_close($link);
}
?>