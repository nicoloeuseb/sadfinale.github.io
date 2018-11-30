 <?php  
 $connect = mysqli_connect("localhost", "root", "", "sad");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $SupplierName = mysqli_real_escape_string($connect, $_POST["SupplierName"]);  
      $SupplierAdd = mysqli_real_escape_string($connect, $_POST["SupplierAdd"]);  
      $SupplierContactNum = mysqli_real_escape_string($connect, $_POST["SupplierContactNum"]);  
    
      if($_POST["employee_id"] != '')  
      {  //insert update query
           $query = "  
           UPDATE supplier   
           SET SupplierName='$SupplierName',   
           SupplierAdd='$SupplierAdd',    
           SupplierContactNum = '$SupplierContactNum'            
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }   //end update data query
      else
      {  
           $query = "  
           INSERT INTO supplier(SupplierName, SupplierAdd, SupplierContactNum)  
           VALUES('$SupplierName', '$SupplierAdd', '$SupplierContactNum');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM supplier ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered" id="employee">  
                     <tr>  
									<th width="70%">Supplier Name</th>  
                                    <th width="5%">Edit</th>  
                                    <th width="5%">View</th>  
									<th width="10%">Delete</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                      
								<form action=delete.php method=POST>
                               <tr>  
                          <td>' . $row["SupplierName"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td> 
						  <td><button type=submit name=delete class=btn btn-info btn-xs view_data del value=delete id=delete>delete</button></td>
						  <input type="hidden" name="SupplierID" value=<?php echo $row["id"]?>						  
                     </tr>  
					 </form>
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>