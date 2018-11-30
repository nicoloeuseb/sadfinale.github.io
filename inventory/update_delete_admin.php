<?php
session_start();
$link = mysqli_connect('localhost','root','','sad');

	$prodid=$_POST['prodid'];
    $prodname =$_POST['prodname'];
	$uprice =$_POST['uprice'];
	$prodq =$_POST['prodq'];

   
if(isset($_POST['update'])){ 
  //$update_query = "UPDATE inventory SET comment_status=1 WHERE comment_status=0";
    $qry = "UPDATE inventory SET  prodid='$prodid', prodname='$prodname',  uprice='$uprice',  prodq='$prodq' ,comment_status=0  WHERE '$prodid' = prodid";
    mysqli_query($link,$qry);
	// echo "<script>alert('Updated successfully!');</script>";
		  echo "<script>location.href='http://localhost/sadfinal/inventory/inventoryadmin.php'</script>";
  //  echo "Successfully Updated! ";
    //header("refresh:2;url=trial.php");
    mysqli_close($link);
}
else if(isset($_POST['delete'])){
    $qry="DELETE FROM inventory WHERE '$prodid'=prodid";
    mysqli_query($link,$qry) or die("query failed". mysqli_error($link));
    // echo "<script>alert('Successfully Deleted!');</script>";
		  echo "<script>location.href='http://localhost/sadfinal/inventory/inventoryadmin.php'</script>";
    mysqli_close($link);
}
?>