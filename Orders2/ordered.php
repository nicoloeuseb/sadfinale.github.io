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

session_start();
$connect = mysqli_connect('localhost','root','','sad'); 



$qry = "SELECT DISTINCT CONCAT(fname,' ',lname)AS fname, inventory.prodname,quantity,uprice FROM orders,customer,inventory WHERE orders.id = customer.id AND inventory.ProdID = orders.ProdID ORDER BY orders.id";
$res = mysqli_query($connect, $qry);
$previousname ="";
?>
<div class="table-responsive">
	<table class="table table-bordered">
		<caption style="text-align: center;font-weight: bold;text-transform: uppercase; padding: 15px;font-size: 20px; color: black;">Order Report</caption>
		<tr>
			<th width="30%" style="background: LimeGreen;color: MintCream;">Customer Name</th>
			<th width="20%" style="background: LimeGreen;color: MintCream;">Item Name</th>
			<th width="20%" style="background: LimeGreen;color: MintCream;">Quantity</th>
			<th width="15%" style="background: LimeGreen;color: MintCream;">Price</th>
			<th width="20%" style="background: LimeGreen;color: MintCream;">Total</th> 
		</tr>
	<?php
	$previousname = "  ";
	while($row = mysqli_fetch_assoc($res)):
		
		if($previousname != $row['fname']){
		$prevtotal = 0;
		?>
		<tr style='background: hsl(50, 50%, 80%);'>
			<td style='background: hsla(50, 25%, 60%, 0.7);'><?php echo $row['fname']; ?></td>
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
			<td style='background: hsl(50, 50%, 80%);'><?php echo $row['prodname']; ?></td>
			<td style='background: hsl(50, 50%, 80%);'><?php echo $row['quantity']; ?></td>
			<td style='background: hsl(50, 50%, 80%);'><?php echo $row['uprice']; ?></td>	
			<td style='background: hsl(50, 50%, 80%);'><?php echo $prevtotal ?></td>
			<td><?php //echo number_format($row['uprice'] * $row['quantity'],2); ?></td>
		<div>	<!--<input type="submit" value="delete"> -->
							</form>
			
			
		</tr>
		<?php
	endwhile;
	?>
	</table>

</div>
<?php

?>
