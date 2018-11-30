<?php
require 'connect.php';
if(empty($_SESSION["username"])){
	?> 
	<?php
header("url=http://localhost/sadfinal/SadLoginAdmin.html");}
	?>
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "sad");  
 $query = "SELECT * FROM employee ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html> 
 
    
	<head>  
	  <style>
	  body{
		 background-image: url("bg.jpg");
	     background-repeat: no-repeat;
         background-size: cover;
	  }
	  #employee th {
    padding-top: 12px;
    padding-bottom: 20px;
    text-align: center;
    background-color:black;
    color: white;
}
.clr{ background-color:black;
color: white;
padding-top: 1px;
padding-bottom: 1px;
}
.nav-link{color: white;}
.logout{ 
margin-left:-15px;
text-align: right;
border-left: 6px solid red;
}
.bar{ margin-left: -20px;}
.nm{ margin-left:515px;}
.is{margin-left: 200px;}
.sup{margin-left: 10px;}
#logoo{
	position: absolute;
	left: 20px;
    top: 5px;
	height: 70px;
	width: 160px;
	z-index: 2;
	padding-right: 0px;
	padding-top: 0px;	
}
.nav-link{ padding: 100px;}
#delete { padding: 0px 4px 0px 4px; background-color: #EF2C2C; color: white;}
#ft{font-family:"verdana"; font-size: 20px;   font-weight: normal; }

	  </style>
           <title>Employee Accounts</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		   
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
	  
		<div class="float-sm-left">
		<div class="float-md-left">
		<div class="float-lg-left">
		<div class="float-xl-left">
		
	  <ul class="nav nav-tabs clr" id="ft">
	  <img id= "logoo" src="logo.png" alt="logo"> 
  <li class="nav-item">
    <a class="nav-link active is" href="http://localhost/sadfinal/inventory/inventoryadmin.php">Inventory</a>
  </li>
  <li class="nav-item">
    <a class="nav-link sup" href="http://localhost/sadfinal/supply/index.php">Supplier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link sup" href="http://localhost/sadfinal/customer/index.php">Customer</a>
  </li>
   <li class="nav-item nm">
    <a class="nav-link bar" href="#!"> <?php echo  $_SESSION['username']?></a>
  </li>
  <li class="">
    <a class="nav-link bar" href="#!">|</a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link disabled logout" href="sessiondestroy.php">Logout</a>
  </li>
</ul>
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Employee Account Details</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered" id="employee">  
                               <tr>  
                                    <th width="50%">First Name</th>  
									 <th width="50%">Last Name</th>
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
									 <th width="15%">Delete</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
							   <?php 
								echo "<form action='delete.php' method=POST>"; ?>
                               <tr style='background: lightgray;'>  <input name="id" value="<?php $row['id'];?>" hidden>
                                    <td><?php echo $row["fname"]; ?></td>  
									<td><?php echo $row["lname"]; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
									<?php echo "<td><button type=submit name=delete class=delete btn btn-info btn-xs view_data del value=delete id=delete>delete</button></td>"; ?>
									<input type="hidden" name="id" value=<?php echo $row['id']?>>		
                               </tr>  
							   <?php echo "</form>"; ?>
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 
 <!-- VIEW EMPLOYEE DETAILS -->
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
				
			
				   
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
					<input name="id" value="<?php $row['id'];?>" hidden>
                </div>  
                <div class="modal-footer">  
				
                     
					 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
                </div>  
           </div>  
      </div>  
 </div>  
 <!-- END OF VIEW EMPLOYEE DETAILS -->
 
<!-- INSERT DATA TO ACCOUNTS -->	<!--INSERT DATA TO ACCOUNTS --><!-- INSERT DATA TO ACCOUNTS --><!--INSERT DATA TO ACCOUNTS -->
										
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter First Name</label>  
                          <input type="text" name="fname" id="fname" class="form-control" />  
                          <br />  
                          <label>Enter Last Name</label>  
                          <textarea name="lname" id="lname" class="form-control"></textarea>  
                          <br />  
                          <label>E-mail</label>
                          <input  type="email" name="email" id="email" class="form-control">    
				          <br />  
                          <label>Enter Username</label>  
                          <input type="text" name="user" id="user" class="form-control" />  
                          <br />  
                          <label>Enter Password</label>  
                          <input type="text" name="pass" id="pass" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>   <!-- END OF INSERT DATA AND UPDATE TO ACCOUNTS -->
           </div>  
      </div>  
 </div>  
 </div><br>
 </div><br>
 </div><br>
 </div><br>
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#fname').val(data.fname);  
                     $('#lname').val(data.lname);  
                     $('#email').val(data.email);  
                     $('#user').val(data.user);  
                     $('#pass').val(data.pass);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#fname').val() == "")  
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
		     else if($('#pass').val() == '')  
           {  
                alert("Password is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
  <script>
 $(".delete").click(function(){
return confirm("Are you sure you want to delete this account?"); });
</script>
 