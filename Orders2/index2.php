
<?php

session_start();
$connect = mysqli_connect("localhost","root","","sad");

//$_SESSION['username']='tmd';
//$_SESSION['id']='43';
 ?>  
 		<?php

if(empty($_SESSION["username"])){
	?> 
	<?php
header("refresh: 0;url=http://localhost/sadfinal/SadLoginCustomer.html");}
	?>
 <?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "sad";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `customer`";

// for method 1

$result1 = mysqli_query($connect, $query);

// for method 2

$result2 = mysqli_query($connect, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>
 <!DOCTYPE html>  
 <html>
 <style>
 
	div.content
		{
		text-align:center;
		margin: 10px;
		font-size: 20px;
		border: 3px solid #ccc;
		border-radius: 5px;
		box-sizing: border-box;

		}

	.logout {
	 background: #e60000;
	  width: 100px;
	  cursor:pointer;
	  border-radius:30px;
	  padding:5px 10px 5px 5px;
	  color:White;
	  font-size:14px;
	  font-weight: bold;
	  text-align:left;
	  text-indent:30px;
	 
	  margin:0 auto;
	 
	  /* Animations: */
	  -webkit-transition-timing-function: ease-in-out;
	  -webkit-transition-duration: .4s;
	  -webkit-transition-property: all;
	  
	  -moz-transition-timing-function: ease-in-out;
	  -moz-transition-duration: .4s;
	  -moz-transition-property: all;
	}

	.logout:hover {
	  text-indent: 5px;  
	}

	div.header
	{
		display: inline;
		overflow: auto;
	}

	div.formHeader
	{
		margin-top: -30px;
		text-align: right;
	}

	div.formHeader2
	{
		margin-top: 10px;
		text-align: left;
	}
	#logo{
	position: absolute;
	left: 5px;
    top: 1px;
	height: 100px;
	width: 280px;
	z-index: 1;
	padding-right: 0px;
	padding-top: 0px;
margin-top: 5px;	
}
.top{height: 70px;}
 </style>
      <head>  
           <title>Order Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"/>
           <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
           <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
           <script src="js/index.js"></script>
      </head>
      <body>  
   			<div class='w3-container top' style="background: black">
			<img id= "logo" src="logo.png" alt="logo">
			  <h2 style='font-weight: bold; color: MintCream; font-family:'Segoe UI',Arial,sans-serif'>              </h2>

			  <h4 style="font-weight: bold; color: MintCream; font-family:'Segoe UI',Arial,sans-serif; text-align: right;">Order Form</h4>

			</div>

   			<div class='w3-card-2 topnav notranslate' id='topnav'>
   				<div style="overflow:auto;">
   					<div class="w3-bar w3-left" style="width:100%;overflow:hidden;height:40px;background:hsl(50, 50%, 80%);">
   						<div class="formHeader2">
					 		<span style = "font-size: 16px; padding: 10px 10px 10px 10px;" class="label label-success"> Welcome <?php echo $_SESSION['username']?> </span>
					 	</div>
					    <div class="formHeader">
					    	<form> <input type="button" value="Logout" class="logout" onclick="window.location.href='sessiondestroy.php'" /> </form>
						</div>
					</div>
				</div>
			</div>

		   	<div class="content">
					<!--Date:<input type="text" name="date" style="margin: 10px;" value="<?php  //echo date("m/d/Y"); ?>"> 
					Order Number:<input type="text" name="num" style="margin: 10px;" value="<?php //$rand = rand(1000,2000); echo $rand;?>"></br></br> -->
					<?php //echo $_SESSION['username']?> </div>
					<?php
					//$name=$_SESSION['username']; 
					//$query="Select fname from customer where user='$name'";
					//$row=mysqli_query($conn, $query);
					//$rows=mysqli_num_rows($row);
					//$records=mysqli_fetch_array($row);
					//echo $records['fname'];
					
					?>
		   <div class="w3-container">		
	           <div style="width:700px; float: left; background: lightgray; margin-right: 5px; border-radius: 25px;">  
	                
	                <?php 
					$user=$_SESSION['username'];
					$query = "SELECT prodid,prodname,uprice,supid,prodq,customer.id FROM inventory,customer where customer.user ='$user' ORDER BY ProdID ASC";
					$result = mysqli_query($connect, $query); 
					if(mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result) )
						{
					?>
					
					<div class="col-md-4">
						<form method="POST" action="index_func.php">
							<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px; margin: 10px;" align="center">  
							<h5 class="text-info"><?php echo $row["prodname"];?></h5>
							<h5 class="text-danger">₱ <?php echo $row["uprice"]; ?></h5>
							<input type="number" name="quantity" class="form-control" value=0 />
							<input type="hidden" name='prodid' value='<?php echo $row['prodid'] ?>'>
							<input type="hidden" name='id' value='<?php echo $row['id'] ?>'>
							<input type="hidden" name="hidden_name" value="<?php echo $row['prodname']; ?>" />
							<input type="hidden" name="hidden_price" value="<?php echo $row['uprice']; ?>" />
							
							<input type="submit" name="add_to_cart" style="margin-top:9px;"  class="btn btn-success" value="Add to Cart" />
							</div>
						</form>
					</div>
					
					<?php
						}
					
					}
					?>
					<br/>
				</div>

				<!--                           TABLES                          -->
				<div >

					<div class="table-responsive">
						<table class="table table-bordered">
						    <caption style="text-align: center;font-weight: bold;text-transform: uppercase; padding: 15px;font-size: 20px; color: black;">Order Details</caption>
							<tr>
								<th width="40%" style="background: black;color: MintCream;">Item Name</th>
								<th width="10%" style="background: black;color: MintCream;">Quantity</th>
								<th width="20%" style="background: black;color: MintCream;">Price</th>
								<th width="15%" style="background: black;color: MintCream;">Total</th>
								<th width="5%" style="background: black;color: MintCream;">Action</th>
							</tr>
							 
							<?php
							$id=$_SESSION['id'];
							$qry="select inventory.prodname, orders.quantity, inventory.uprice, orders.prodid from orders,inventory where inventory.prodid=orders.prodid and orders.id= '$id' and DATE_FORMAT(orders.time_stamp, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')";
							$qry2=mysqli_query($connect,$qry);
							while($row=mysqli_fetch_array($qry2)){
							
							echo "<tr style='background: rgb(200, 200, 200);'><td>";
							echo $row['prodname'];
							echo "</td> <td>";
							echo $row['quantity'];
							echo "</td> <td>";
							echo $row['uprice'];
							echo "</td><td>";
							$temp=$row['quantity']*$row['uprice'];
							echo number_format($temp, 2);
							echo "</td><td>";

							?>
							<form method="POST" action="delete.php">
							<input type="hidden" name="quantity" value='<?php echo $row['quantity']; ?>'>
							<input type="hidden" name='prodid' value='<?php echo $row['prodid']; ?>'>
							<input type="hidden" name='id' value='<?php echo $_SESSION['id'] ?>'>
							<input type="submit" class="btn btn-danger" value="Cancel">
							</form>
							
							<?php
							echo "</td></tr>";
							
							
							}
							$totalQuery="SELECT FORMAT(SUM(o.quantity * inv.uprice), 2) AS grandTotal FROM orders o LEFT OUTER JOIN inventory inv ON inv.prodid = o.ProdID WHERE o.Id = '$id' and DATE_FORMAT(o.time_stamp, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')";

							$totalOutput = mysqli_query($connect, $totalQuery) or die("Error: " . mysqli_error($connect));
							$totalData = mysqli_fetch_assoc($totalOutput);
							echo "<tr>";
							echo "<td style='font-weight: bold; text-align:left; border-top: 3px solid black; background: darkgray;color: black;' colspan='3'>GRAND TOTAL</td>";
							echo "<td style='font-weight: bold; border-top: 3px solid black; background: darkgray;color: black; padding-left:60px;' colspan='2'>";
							echo $totalData['grandTotal'];
							echo "</td>";
							//echo "<td style='font-weight: bold; border-top: 3px solid black; background: LimeGreen;color: MintCream;'>";
							//echo "</td>";
							echo "</tr>";
							?> 
						</table>

						
						<hr style="border: 1px solid black; border-radius: 10px;">

						<h3 style="text-align: center;font-weight: bold;text-transform: uppercase; padding: 10px;color: black;">Preveious Order Summary</h3>

					</div>

					<?php ///////////////////////////// ORDER SUMMARY//////////////////////////////////

					$qry = "SELECT DISTINCT o.Id, CONCAT(fname,' ',lname) AS Name, DATE_FORMAT(o.time_stamp, '%Y-%m-%d') AS orderDate FROM orders o INNER JOIN customer c ON c.Id = o.Id WHERE o.id = '$id' and DATE_FORMAT(o.time_stamp, '%Y-%m-%d') <> DATE_FORMAT(NOW(), '%Y-%m-%d') GROUP BY o.Id, DATE_FORMAT(o.time_stamp, '%Y-%m-%d')";

					$res = mysqli_query($connect, $qry) or die("Error: " . mysqli_error($connect));

					?>

					<div class="table-responsive" style="background: LIGHTGRAY; border-radius: 20px;">
						<table class="table" style='text-align:center;' align='center'>
							<?php
							while($row=mysqli_fetch_array($res))
							{
								echo "<tr> <td>";
							?>
									<table class="table table-bordered" style="margin-bottom: 30px;" cellpadding="5">
										<?php 
											echo "<tr> <td style='font-weight: bold; font-size:20px;' colspan='2'>";
											echo $row['Name'];
											echo "</td> <td style='font-weight: bold; font-size:16px;' colspan='2'>";
											echo $row['orderDate'];
											echo "</td> </tr>";
										?>
										<tr>
											<th width="40%" style="background: LimeGreen;color: MintCream;">Item Name</th>
											<th width="30%" style="background: LimeGreen;color: MintCream;">Unit Price</th>
											<th width="20%" style="background: LimeGreen;color: MintCream;">Quantity</th>
											<th width="25%" style="background: LimeGreen;color: MintCream;">Total</th>
										</tr>
										<?php 
											$customerId = $row['Id'];
											$orderingDate = $row['orderDate'];
											$qry2 = "SELECT inv.prodname, inv.uprice, o.quantity, DATE_FORMAT(IFNULL(o.time_stamp, NOW()), '%Y-%m-%d') as dateOrdered, (inv.uprice * o.quantity) AS total FROM orders o LEFT JOIN inventory inv ON inv.prodid = o.ProdID WHERE o.Id = $customerId AND DATE_FORMAT(o.time_stamp, '%Y-%m-%d') = '$orderingDate'";

											$res2 = mysqli_query($connect, $qry2) or die("Error: " . mysqli_error($connect));

											while($row2=mysqli_fetch_array($res2))
											{
												echo "<tr style='background: hsl(50, 50%, 80%);'><td>";
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

											echo "<tr style='border-top: 3px solid black; background: LimeGreen'>";
											// Order Received Function
											echo "<td>";
											// style='border-top: 3px solid black; background: LimeGreen;
											?>

											<form method="POST" action="orderReceived.php">
											<input type="hidden" name='date' value='<?php echo $orderingDate; ?>'>
											<input type="hidden" name='id' value='<?php echo $_SESSION['id'] ?>'>
											<input type="submit" class="btn btn-danger" value="Receive Order">
											</form>

											<?php
											echo "</td>";

											echo "<td style='font-weight: bold;text-align:center; color: MintCream;' colspan='2'>GRAND TOTAL</td>";

											echo "<td style='font-weight: bold;color: MintCream;'>";
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
					</div>

				</div> <!-- End for Right Align Tables-->



				<div style="clear:both"></div>
			</div>


			<br/>
		</body>
	</html>
	