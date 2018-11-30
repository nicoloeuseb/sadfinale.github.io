<?php 
//insert
if(isset($_POST['add_to_cart'])){
$connect = mysqli_connect("localhost","root","","sad");

// Check connection
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$qty=$_POST['quantity'];
$pid=$_POST['prodid'];
$id=$_POST['id'];
$date_time=DATE('Y-m-d');
//$date_time=DATE('YYYY-MM-dd');
$query="INSERT INTO orders(id,ProdID,quantity,time_stamp) VALUES($id,'$pid','$qty','$date_time')";
//$query="INSERT INTO orders(id,ProdID,quantity,time_stamp) VALUES($id,'$pid',$qty,NOW())";
//$r = mysqli_query($connect,$query);
mysqli_query($connect, $query) or die(mysqli_error($connect));

/*if(mysqli_query($connect, $query)){
    echo "<script>alert('Query successful!');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/
//echo "dfdfdfd";
//header('refresh:10;url=index.php');

}


//update inventory
$prodid= $_POST['prodid'];
$quantity= $_POST['quantity'];
$prodname= $_POST['hidden_name'];

  $sql="SELECT * FROM `orders` where prodid=$prodid ORDER BY time_stamp DESC";
  $result = mysqli_query($connect, $sql) or die("Error: " . mysqli_error($connect));
	  
		 $records = mysqli_fetch_assoc($result);
		 $quantity = $records['quantity'];
		
		$prodq= "prodq";
 $sql2="SELECT * FROM  inventory where prodq=$prodq";   
		$result = mysqli_query($connect, $sql2)
		or die("Error: " . mysqli_error($connect));
	  
		$records = mysqli_fetch_assoc($result);
		 
		$prodq = $records['prodq'];
		
if(isset($_POST['add_to_cart'])){
	$currentquantity="prodq";
	// "UPDATE invetory SET prodq= prodq-$quantity where prodid=$prodid";
  	$update_query = "UPDATE inventory SET prodq= $currentquantity-$quantity ,comment_status=0 where prodid=$prodid";
  	//mysqli_query($connect, $update_query);

  	mysqli_query($connect, $update_query) or die(mysqli_error($connect));

	//echo "<script>alert('Ordered successfully!');</script>";
	echo "<script>location.href='http://localhost/sadfinal/orders2/index2.php'</script>";
			//  echo "Successfully Updated! ";
			//header("refresh:2;url=trial.php");
			//  mysqli_close($link);
 }
			//$sql3="UPDATE invetory SET prodq= prodq-$quantity where prodid=$prodid";


?>