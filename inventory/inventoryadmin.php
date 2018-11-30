
		<?php
require 'connect.php';
if(empty($_SESSION["username"])){
	?> 
	<?php
header("url=http://localhost/sadfinal/SadLoginAdmin.html");}
	?>
	<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `inventory` WHERE CONCAT(`prodid`, `prodname`, `uprice`, `supid`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `inventory`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "sad");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
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
$query = "SELECT * FROM `supplier`";

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
<title>Inventory</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="style2.css">
 <meta name="viewreport" content="width=device-width", intial-scale=1>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<head>
<style>

.site-header{ 

margin-top:10px;
background: black; 
color:white; 
padding: 15px 5px 15px 5px;
font-family: Arial;
box-shadow: 0 1px 3px #333;
border-radius:0.8em;
}
.site-header h1{margin: 0px; font-size: 25px; } 
html, body {
    font-family: Verdana,sans-serif;
    font-size: 15px;
    line-height: 1;
    margin: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}
.bg-modal{
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.7);
	position: absolute;
	top: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	display: none;
	
}	
.modal-content{
	width: 600px;
	height: 510px;
	background-color: white;
	border-radius: 10px;
	text-align:center;
	padding: 30px;
	position: relative;
}

#head{
	text-align: center;
	font-weight: ;
	color: black;
	font-size: 35px;
	border-bottom:3px solid lightgray;
	
}

input{
	width:50%;
	display:block;
	margin: 15px auto;
}

.close{
	position: absolute;
	top:0;
	right: 14px;
	font-size:42px;
	transform: rotate(45deg);
	cursor: pointer;
	
}

.container {
    position: relative;
}

	.field{
   position: absolute;
   height: 72px;
   padding: 16px 0 8px 0;
   width: 450px;
   margin-left:50px;
}

.field-label{
   position: absolute;
   margin: 0;
   display: block;

   color:  black;
   line-height: 16px;
   font-size: 16px;
   font-weight: 400;

   transform: translateY(24px);
   transition: transform 0.3s, color 0.3s;
   transform-origin: 0 50%;
}
.field-input{
   position: absolute;
   display: block;
   width: 100%;
   height: 10px;
   padding: 8px 0;

   line-height: 16px;
   font-family:  "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
   font-size: 16px;

   background: transparent;
   border: none;
   -webkit-appearance: none;
   outline: none;
}
.field::after, .field::before{
   content:'';
   height: 2px;
   width: 100%;
   position: absolute;
   bottom: 6px;
   left: 0;

   background-color: rgb(89,81,81);
}

.field::after{
   background-color: red;
   transform: scaleX(0);
   transition: transform 0.3s;
}
.has-label .field-label{
   transform: translateY(0) scale(0.75);
}

.is-focused .field-label{
   color: red;
}
.field.is-focused::after{
   transform: scaleX(1);
}

#button1 {
    position: absolute;
    top: 175px;
    right: 13px;
    font-size: 18px;
	text-decoration: none;
	background-color: #0184ff; 
    
    color: white;
    padding: 4px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	border-radius:0.3em;
	cursor:pointer;
	 box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
	 border:1px solid rgba(0,0,0,0.4);
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  
}

#button2 {
    background-color: #0184ff; 
    width:105px;	
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	border-radius:0.3em;
	cursor:pointer;
	 box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
	 border:1px solid rgba(0,0,0,0.4);
	text-shadow:0 -1px 0 rgba(0,0,0,0.4);
    }

.text1 text{ border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.text {
    position: absolute;
    top: -5px;
    left: 1230px;
    font-size: 18px;
	width: 120px;
	height: 30px;
	color: black;
	
}

#search{
	position: absolute;
	top: -5px;
	right: 131px;
	height: 30px;
    width: 40px;
	 background-color: black;
    color: white;
    border: 1px solid lightgray;
	cursor: pointer;
	padding: 6px 55px 10px 5px;
	text-align: center;
}



tr:nth-child(odd) {background-color: white;  }

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 103%;
	text-align: center;
	font-size:25px;
	
    margin-right: 0px;
    margin-left: -18px;
	
	
}

#customers td, #customers th {
    border: 2px solid #ddd;
	padding: 15px 0px 0px 0px;
	text-align: center;
	font-size: 15px;
	
	
	
	
}

#customers tr:nth-child(odd){background-color: rgb(200, 200, 200); }

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: center;
    background-color:black;
    color: white;
	   margin: 0px;
}

#update {
    background-color: #0184ff; 
    
    color: white;
    padding: 3px 7px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
	border-radius:0.3em;
	cursor:pointer;
	 box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
	 border:1px solid rgba(0,0,0,0.4);
	text-shadow:0 -1px 0 rgba(0,0,0,0.4);
    }
	
	#delete {
    background-color: red; 
    
    color: white;
    padding: 3px 7px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
	border-radius:0.3em;
	cursor:pointer;
	 box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
	 border:1px solid rgba(0,0,0,0.4);
	text-shadow:0 -1px 0 rgba(0,0,0,0.4);
    }

	.field{
   position: relative;
   height: 72px;
   padding: 16px 0 8px 0;
}
#s1{
	margin-top:20px;
	width:330px;
}
#s2{
	margin-top:-10px;
}
#textbox{
	margin-top: 0px;
	text-align: center;
	 background-color: transparent;  
    border-style: solid;  
    border-width: 0px 0px 1px 0px;  
	border-color: rgb(200, 200, 200);
	
}
.nm{
	position: absolute;
	margin-top: -25px;
	margin-left: 1010px;
	font-size: 24px;
	text-transform: uppercase;
	
}

.invent{
	margin-top: ;
}
.wew{
	text-decoration: none;
}
.wew{
background-color: white;	
}.tag{position:absolute; right:20px;}
#mysidebar{text-docoration=none;}
.tag1{position:absolute; }
.ty{ z-index: -1;}
</style>
</head>
<body>
	
 
   

<div class="w3-sidebar w3-black w3-bar-block w3-card w3-animate-left tag1" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button" id="button">Add Product</a>
  <a href= "http://localhost/sadfinal/employee/index.php" class="w3-bar-item w3-button" id="button">Employee</a>
   <a href= "http://localhost/sadfinal/supply/index.php" class="w3-bar-item w3-button" id="button">Suppliers</a>
    <a href= "http://localhost/sadfinal/customer/index.php" class="w3-bar-item w3-button" id="button">Customers</a>
	    <a href= "http://localhost/sadfinal/inventory/ordered3.php" class="w3-bar-item w3-button" id="button">Orders</a>
  <a href="sessiondestroy.php" class="w3-bar-item w3-button">Logout</a>

</div>

<div id="main">

<div class="w3-teal w3-black clr" >
  <button id="openNav" class="w3-button w3-teal w3-black w3-xlarge ty" onclick="w3_open()">&#9776;</button>

  <div class="w3-container w3-black invent wew" >
 <div class="nm"> <?php echo  $_SESSION['username']?> </div>
       <ul class="nav navbar-nav navbar-right tag">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    
    <h1>Inventory</h1> 
	
	
	<form action="#" method="POST">
	
	 <input type="text" name="valueToSearch" placeholder="" class="text">
	 <input type="submit" name="search" src="search.png" value="Search" id="search"> 

	 
           <!--<input type="submit" name="search" src="search.png" value="Filter" id="search"> 
			  <!-- populate table from mysql database -->
			  
			<!-- <input type="image" name="search" src="search.png" id="search"> -->
			<!--<img name="search" src="search.png" id="search"> -->
			</div>
			</div>
	</form>
  </div>
</div>  


<div class="w3-container" id="brd"> 
  <table class="w3-table w3-bordered" id="customers">
    
	<tr>
	
	   <th>Product Number</th>
       <th>Product Name</th>
	   <th>Price/kg</th>
	   <th>Supplier Name</th>
	   <th>Product Quantity</th>
	   <th>Update</th>
	   <th>Delete</th>
	  
    </tr>

 <?php while($row = mysqli_fetch_array($search_result)):
                echo "<form action='update_delete_admin.php' method=POST>"; ?>
				<tr>
                     <td><input id="textbox" type="text" name="prodid" value="<?php echo $row['prodid'];?> "></td>
					<input name="prodid" value="<?php $row['prodid'];?>" hidden>
					
                  	<td><input id="textbox" type="text" name="prodname" value="<?php echo $row['prodname'];?>" ></td>
                    <td><input id="textbox" type="text" name="uprice" value="<?php echo $row['uprice'];?>"></td>
                    <td><?php echo $row['supid'];?></td>
					<td><input id="textbox" type="text" name="prodq" value="<?php echo $row['prodq'];?>"</td>		
											
					<?php echo "<td><button type=submit name=update value=update id=update class=update>update</button></td>"; ?>
					<?php echo "<td><button type=submit name=delete value=delete id=delete class=delete>delete</button></td>"; ?>
					<input type="hidden" name="prodid" value=<?php echo $row['prodid']?>>
					
                </tr>
				<?php echo "</form>"; ?>
                <?php endwhile;?>
</table>
</div>

</div>

<div class="bg-modal">


		<div class="modal-content">
			
		<div class="close">+</div>
		<form id="registration" method="POST" action="admininventory.php" id="insert_form" onsubmit="return Validate()" name="vform">
			<header class="site-header">
			<h1> Product Details </h1>
			</header>
			<br>
			
		
			<div class="field">
					<label for="doge" class="field-label">Product Number</label>
					<input type="text" name="fname" id="doge" class="field-input" value="<?php $rand = rand(1000,2000); echo $rand;?>">
					<!-- <input type="text" id="doge" name="fname" class="field-input" value="<?php //echo $rand;?>"> -->
			</div>
			<div class="field" id="lname_div">
					<label for="doge" class="field-label">Product Name</label>
					<input type="text" id="doge" name="lname" class="field-input" required>
					<div id="lname_error"></div>
			</div>
			<div class="field">
					<label for="doge" class="field-label">Unit Price</label>
					<input type="number" id="doge" name="email" class="field-input" required>
			</div>
					<label>Supplier Name</label>
			<select id="s1" name="uname">
					<?php while($row1 = mysqli_fetch_array($result1)):;?>
					<option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
					<?php endwhile;?>
			</select>
			
			<div class="field" id="s2">
					<label for="doge" class="field-label">Product Quantity</label>
					<input type="number" id="doge" name="pass" class="field-input" required>
			</div>
			
	
			<br><input type="submit"  name="post" value="ADD" id="button2">
				</form>
		</div>
	<script>
	$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetchnotif.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
  $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
	</script> 
<script>
// SELECTING ALL TEXT ELEMENTS
var lname = document.forms['vform']['lname'];
// SELECTING ALL ERROR DISPLAY ELEMENTS
var lname_error = document.getElementById('lname_error');
// SETTING ALL EVENT LISTENERS
lname.addEventListener('blur', lnameVerify, true);
// validation function
function Validate() {
 
  // validate email
  if (lname.value == "") {
    lname.style.border = "1px solid red";
    document.getElementById('lname_div').style.color = "red";
    lname_error.textContent = "Email is required";
    lname.focus();
    return false;
  }
  // event handler functions
  function lnameVerify() {
  if (lname.value != "") {
  	lname.style.border = "1px solid #5e6e66";
  	document.getElementById('lname_div').style.color = "#5e6e66";
  	lname_error.innerHTML = "";
  	return true;
  }
</script>		
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
 $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#doge').val() == "")  
           {  
                alert("First Name is required");  
           }  
           else if($('#lname').val() == '')  
           {  
                alert("Last Name is required");  
           }  
           else if($('#email').val() == '')  
           {  
                alert("E-mail is required");  
           }  
           else if($('#user').val() == '')  
           {  
                alert("User is required");  
           }  
</script>
<script>
jQuery(function($) {
  //  Au focus
  $('.field-input').focus(function(){
    $(this).parent().addClass('is-focused has-label');
  });

  // à la perte du focus
  $('.field-input').blur(function(){
    $parent = $(this).parent();
    if($(this).val() == ''){
      $parent.removeClass('has-label');
    }
    $parent.removeClass('is-focused');
  });

  // si un champs est rempli on rajoute directement la class has-label
  $('.field-input').each(function(){
    if($(this).val() != ''){
      $(this).parent().addClass('has-label');
    }
  });

})
</script>
		
<script>
document.getElementById('button').addEventListener('click', 
function(){
document.querySelector('.bg-modal').style.display= 'flex';
});

document.querySelector('.close').addEventListener('click',
function(){
document.querySelector('.bg-modal').style.display='none';
});
</script>	

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
<script>
$(".delete").click(function(){
return confirm("Are you sure you want to delete this product?"); });
</script>

<script>
$(".update").click(function(){
return confirm("Are you sure you want to update this product?"); });
</script>

</body>
</html>