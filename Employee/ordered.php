<!DOCTYPE html>  
 <html>
 <style>
 
 .mid{ text-align: center;
}

#mid td, #mid th {
    border: 2px solid #ddd;
	padding: 15px 0px 0px 0px;
	text-align: center;
	font-size: 15px;
 </style>
<?php
require 'connect.php';

$qry = "SELECT DISTINCT CONCAT(fname,' ',lname)AS fname, inventory.prodname,quantity,uprice FROM orders,customer,inventory WHERE orders.id = customer.id AND inventory.ProdID = orders.ProdID ORDER BY orders.id";
$res = mysqli_query($connect, $qry);
$previousname ="";
?>
<table>
	<tr>
		<th>Customer Name</th>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total</th> 
	</tr>
<?php
$previousname = "  ";
while($row = mysqli_fetch_assoc($res)):
	
	if($previousname != $row['fname']){
	$prevtotal = 0;
	?>
	<tr>
		<td><?php echo $row['fname']; ?></td>
	<?php 
	$previousname = $row['fname'];
	}
	else{
	?> 
		<td> </td>
	<?php	
	
	}
	$total=$row['uprice'] * $row['quantity'];
	$prevtotal+=$total;
	?>
	<div id="mid">
	<!--<form method="post" action="delete2.php"> -->
		<td><?php echo  $row['prodname']; ?></td>
		<td><?php echo $row['quantity']; ?></td>
		<td><?php echo $row['uprice']; ?></td>	
		<td><?php echo $prevtotal ?></td>
		<td><?php //echo number_format($row['uprice'] * $row['quantity'],2); ?></td>
	<div>	<!--<input type="submit" value="delete"> -->
						</form>
		
		
	</tr>
	<?php
endwhile;
?>
</table>
<?php

?>
