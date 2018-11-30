
<?php

session_start();
$connect = mysqli_connect("localhost","root","","sad");
		
if(empty($_SESSION["username"])){	
header("url=http://localhost/Sadfinal/sadlogincustomer.html");}

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
nme{
	margin-left: 35px;
	margin-top: 100px;
font-size: 25px;}
	#logoo{
	position: absolute;
	left: 80px;
    top: 3px;
	height: 70px;
	width: 160px;
	z-index: 1;
	
	
}
#order {
    font-family: "Times New Roman", Times, serif;
	font-size: 40px;
	margin-top:25px;	
}
#logo{
	position: absolute;
	left: 5px;
    top: 1px;
	height: 80px;
	width: 300px;
	z-index: -1;
	padding-right: 0px;
	padding-top: 0px;
margin-top: 5px;	
}
.user{margin-left: 1110px;
margin-top:-18px;
font-size: 25px;
font-weight:;text-transform: uppercase;}

 </style>
      <head>  
           <title>Order Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"/>
           <link rel="stylesheet" href="css/style.css"/>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
           <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
           <script src="js/index.js"></script>
      </head>
      <body>  
	  <img id= "logo" src="logo.jpeg" alt="logo">
           <br />  <div class="nme">
		   <?php //echo $_SESSION['username']?> </div> <br>  <?php //echo DATE('Y-m-d')?> </div>
		   <div id="logout">
		
		    <a href="sessiondestroy.php" class="logout">Logout</a>
			   <div class="user"><?php echo $_SESSION['username']?> </div>
			</div>
			<h3 id="order" align="center">Order Form</h3><br/> 
		   	<!--<div class="content">  
				
					<h3  align="center">Order Form</h3>
			
					<?php //echo $_SESSION['username']?> </div>
					<?php
					//$name=$_SESSION['username']; 
					//$query="Select fname from customer where user='$name'";
					//$row=mysqli_query($conn, $query);
					//$rows=mysqli_num_rows($row);
					//$records=mysqli_fetch_array($row);
					//echo $records['fname'];
					
					?>-->
					
           <div class="container" style="width:700px;">  
                
				
				
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
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
						<h4 class="text-info"><?php echo $row["prodname"];?></h4>
						<h4 class="text-danger">₱ <?php echo $row["uprice"]; ?></h4>
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
				
				<div style="clear:both"></div>
				<br/>
				<div class="table-responsive">
					<table class="table table-bordered">
					<div id="nme">
					
					  </div>
					    <caption style="text-align: center;font-weight: bold;text-transform: uppercase; padding: 15px;font-size: 20px; color: black;">Order Details</caption>
						<tr>
							<th width="40%" style="background: Black;color: MintCream;">Item Name</th>
							<th width="10%" style="background: Black;color: MintCream;">Quantity</th>
							<th width="20%" style="background: Black;color: MintCream;">Price</th>
							<th width="15%" style="background: Black;color: MintCream;">Total</th>
							<th width="5%" style="background: Black;color: MintCream;">Action</th>
						</tr>
						 
						<?php
						$date_time=DATE('Y-m-d');
						$id=$_SESSION['id'];
						$qry="SELECT inventory.prodname, orders.quantity, inventory.uprice, orders.prodid 
						FROM orders,inventory WHERE inventory.prodid=orders.prodid AND orders.time_stamp='$date_time'
						AND orders.id= '$id'";
						//$qry="SELECT inventory.prodname, orders.quantity, inventory.uprice, orders.prodid 
						//FROM orders,inventory WHERE inventory.prodid=orders.prodid 
						//AND orders.id= '$id'";
						$qry2=mysqli_query($connect,$qry);
						while($row=mysqli_fetch_array($qry2)){
						
						echo "<tr style='background: background: rgb(200, 200, 200);'><td>";
						echo $row['prodname'];
					//	echo "<input type='hidden' value"
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
						<input type="submit" value="delete">
						</form>
						
						
						
						<?php
						
						echo "</td></tr>";
						
						
						}
						$date_time=DATE('Y-m-d');
						$totalQuery="SELECT SUM(o.quantity * inv.uprice) AS grandTotal FROM orders o LEFT OUTER JOIN inventory inv ON inv.prodid = o.ProdID WHERE o.Id = $id AND time_stamp='$date_time'";

						$totalOutput = mysqli_query($connect, $totalQuery) or die("Error: " . mysqli_error($connect));
						$totalData = mysqli_fetch_assoc($totalOutput);
						echo "<tr>";
						echo "<td style='font-weight: bold; text-align:left; border-top: 3px solid black; background: gray;color: MintCream;' colspan='3'>GRAND TOTAL</td>";
						echo "<td style='font-weight: bold; border-top: 3px solid black; background: gray;color: MintCream; padding-left:60px;' colspan='2'>";
						echo $totalData['grandTotal'];
						echo "</td>";
						//echo "<td style='font-weight: bold; border-top: 3px solid black; background: LimeGreen;color: MintCream;'>";
						//echo "</td>";
						echo "</tr>";
						?> 
						
					</table>
				</div>
			</div>
			<br/>
		</body>
	</html>
	