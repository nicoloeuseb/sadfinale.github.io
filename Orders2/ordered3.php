<!DOCTYPE html>  
 <html>
 <style>
 body {
	

   
    background-repeat: no-repeat;
   background-size: cover;

}
 .mid{ text-align: center;
}

#mid td, #mid th {
    border: 2px solid #ddd;
	padding: 15px 0px 0px 0px;
	text-align: center;
	font-size: 15px;
	
	.logout{
	position: absolute;
	top: 12px;
	margin-left: 1230px;
	text-decoration:none;
	background-color: white;
    color: black;
    border: 1px solid black;
	cursor: pointer;
	padding: 10px  15px 10px 15px;
	text-align: center;
	font-size: 20px;
	 display: inline-block;
}
.logout:hover{
background: black;
color:white;
transition: .4s;
text-decoration: none;

}
 </style>
 <body>
<?php
//require 'connect.php';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "sad";

// connect to mysql database
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$qry = "SELECT DISTINCT o.Id, CONCAT(fname,' ',lname) AS Name, DATE_FORMAT(o.time_stamp, '%Y-%m-%d') AS orderDate FROM orders o INNER JOIN customer c ON c.Id = o.Id GROUP BY o.Id, DATE_FORMAT(o.time_stamp, '%Y-%m-%d')";

$res = mysqli_query($connect, $qry) or die("Error: " . mysqli_error($connect));

?>

<div class="table-responsive">
<a "http://localhost/sadfinal/inventory/inventoryadmin.php" class="logout" style='position: absolute;
	top: 12px;
	margin-left: 1230px;
	text-decoration:none;
	background-color: white;
    color: black;
    border: 1px solid black;
	cursor: pointer;
	padding: 10px  15px 10px 15px;
	text-align: center;
	font-size: 20px;
	 display: inline-block;'>Back</a>
	<table class="table table-bordered" style='text-align:center;' align='center'>

 

		<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr> <td>";
		?>
				<table class="table table-bordered" style="margin-bottom: 30px;" cellpadding="10">
					<?php 
						echo "<tr> <td style='font-weight: bold; font-size:20px;'  width='350px'>";
						echo $row['Name'];
						echo "</td> <td style='font-weight: bold; font-size:16px;' colspan='2'>";
						echo $row['orderDate'];
						echo "</td> </tr>";
					?>
					<tr>
						<th width="40%" style="background: black; color: MintCream; font-size:20px;">Item Name</th>
						<th width="30%" style="background: black;color: MintCream; font-size:20px;">Unit Price</th>
						<th width="20%" style="background: black;color: MintCream; font-size:20px;">Quantity</th>
						<th width="25%" style="background: black;color: MintCream; font-size:20px;">Total</th>
					</tr>

					<?php 
						$customerId = $row['Id'];
						$orderingDate = $row['orderDate'];
						$qry2 = "SELECT inv.prodname, inv.uprice, o.quantity, DATE_FORMAT(IFNULL(o.time_stamp, NOW()), '%Y-%m-%d') as dateOrdered, (inv.uprice * o.quantity) AS total FROM orders o LEFT JOIN inventory inv ON inv.prodid = o.ProdID WHERE o.Id = $customerId AND DATE_FORMAT(o.time_stamp, '%Y-%m-%d') = '$orderingDate'";

						$res2 = mysqli_query($connect, $qry2) or die("Error: " . mysqli_error($connect));

						while($row2=mysqli_fetch_array($res2))
						{
							echo "<tr style='background: rgb(200, 200, 200); border: 3px solid black;'><td>";
							echo $row2['prodname'];
							echo "</td><td>";
							echo $row2['uprice'];
							echo "</td><td>";
							echo $row2['quantity'];
							echo "</td><td>";
							echo $row2['total'];
							echo "</td></tr>";
						} // End of While $row2 variable

						$qry3 = "SELECT SUM(o.quantity * inv.uprice) AS grandTotal FROM orders o LEFT OUTER JOIN inventory inv ON inv.prodid = o.ProdID WHERE o.Id = $customerId AND DATE_FORMAT(IFNULL(o.time_stamp, NOW()), '%Y-%m-%d') = '$orderingDate'";
						$res3 = mysqli_query($connect, $qry3) or die("Error: " . mysqli_error($connect));
						$row3 = mysqli_fetch_assoc($res3);

						echo "<tr>";
						echo "<td style='font-weight: bold; text-align:left; border-top: 7px solid gray; background: gray;color: MintCream;' colspan='3'>GRAND TOTAL</td>";
						echo "<td style='font-weight: bold; border-top: 7px solid gray; background: gray;color: maroon;'>";
						echo $row3['grandTotal'];
						echo "</td>";
						echo "</tr>";
					?>

				</table>

		<?php 
			echo "</td> </tr>";
	    } // End of While $row variable
		?>

	</table>
	</body>
</div>