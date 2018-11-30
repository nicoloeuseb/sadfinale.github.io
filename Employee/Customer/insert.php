<?php  
 $connect = mysqli_connect("localhost", "root", "", "sad");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $fname = mysqli_real_escape_string($connect, $_POST["fname"]);  
      $lname = mysqli_real_escape_string($connect, $_POST["lname"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $user = mysqli_real_escape_string($connect, $_POST["user"]);  
      $pass = mysqli_real_escape_string($connect, $_POST["pass"]);  
	  $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $contactNum = mysqli_real_escape_string($connect, $_POST["contactNum"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE customer   
           SET fname='$fname', 
           lname='$lname',   
           email='$email',    
           user = '$user',   
           pass = '$pass',
		   address = '$address',   
           contactNum = '$contactNum'
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
		  
      }  
      else  
      {  
           $query = "  
           INSERT INTO customer(fname, lname, email, user, pass, address, contactNum)  
           VALUES('$fname', '$lname', '$email', '$user', '$pass', '$address', '$contactNum');  
           ";  
           $message = 'Data Inserted';  
		   
      }  
      if(mysqli_query($connect, $query))  
      {  
   header("refresh: 1; url = http://localhost/SAD/index.php");
           $output .= '<label class="text-success">' . $message . '</label>';  
		   
           $select_query = "SELECT * FROM customer ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);
	   
           $output .= '  
                <table class="table table-bordered" id="employee">  
                     <tr>  
                          <th width="70%">First Name</th>  
						  <th width="70%">Last Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["fname"] . '</td>  
						  <td>' . $row["lname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
						  <td><button type=submit name=delete class=btn btn-info btn-xs view_data del value=delete id=delete>delete</button></td>
						  <input type="hidden" name="SupplierID" value=<?php echo $row["SupplierID"]?>		
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>