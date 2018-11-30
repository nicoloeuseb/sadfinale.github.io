<?php
require 'connect.php';
if(empty($_SESSION["username"])){
	?> 
	<?php
header("refresh: 0; url = http://localhost/sadfinal/SadLoginAdmin.html");}
	?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "sad");  
 $query = "SELECT * FROM supplier ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <style>
  body {

	background-image: url("bg1.jpg");
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
 
 
 <html>  
      <head>  
           <title>Renitian Trading</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
	  <body>

		<div class="key">
	  
	    <ul class="nav nav-tabs clr" id="ft">
	  <img id= "logoo" src="logo.png" alt="logo"> 
  <li class="nav-item">
    <a class="nav-link active is" href="http://localhost/sadfinal/inventory/inventoryadmin.php">Inventory</a>
  </li>
  <li class="nav-item">
    <a class="nav-link sup" href="http://localhost/sadfinal/employee/index.php">Employee</a>
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
                <h3 align="center">Renitian Trading Suppliers Module</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>  
                     <br />  
                     <div id="employee_table" >  
                          <table class="table table-bordered" id="employee">  
                               <tr>  
                                    <th width="70%">Supplier Name</th>  
                                    <th width="5%">Edit</th>  
                                    <th width="5%">View</th>  
									<th width="10%">Delete</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                                <?php 
								echo "<form action='delete.php' method=POST>"; ?>
                                <tr style='background: lightgray;'>   
									<input name="id" value="<?php $row['id'];?>" hidden>
                                    <td><?php echo $row["SupplierName"]; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
									<?php echo "<td><button type=submit name=delete class=delete btn btn-info btn-xs view_data del delete value=delete id=delete>delete</button></td>"; ?>
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
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Supplier Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Supplier Details</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Supplier Name</label>  
                          <input type="text" name="SupplierName" id="SupplierName" class="form-control" />  
                          <br />  
                          <label>Supplier Address</label>  
                          <textarea name="SupplierAdd" id="SupplierAdd" class="form-control"></textarea>  
                       
                          <br />  
                          <label>Contact Number</label>  
                          <input type="number" name="SupplierContactNum" id="SupplierContactNum" class="form-control" />  
                          <br />  
                       
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" >
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</div>
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
                     $('#SupplierName').val(data.SupplierName);  
                     $('#SupplierAdd').val(data.SupplierAdd);
                     $('#SupplierContactNum').val(data.SupplierContactNum);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#SupplierName').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#SupplierAdd').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#SupplierContactNum').val() == '')  
           {  
                alert("Contact Number is required");  
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
 });  </script>
 <script>
 $(".delete").click(function(){
return confirm("Are you sure you want to delete this account?"); });
</script>
 </script>
 </div>
 </body>
 </html>