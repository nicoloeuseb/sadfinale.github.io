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
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE employee   
           SET fname='$fname',   
           lname='$lname',   
           email='$email',    
           user = '$user',   
           pass = '$pass'   
           WHERE id='".$_POST["employee_id"]."'";  
		   header("refresh: 1; url = http://localhost/SAD/index.php");
           $message = 'Data Updated';  
		  
      }  
      else  
      {  
           $query = "  
           INSERT INTO employee(fname, lname, email, user, pass)  
           VALUES('$fname', '$lname', '$email', '$user', '$pass');  
           ";  
           $message = 'Data Inserted';  
		   
      }  
      if(mysqli_query($connect, $query))  
      {  
   header("refresh: 1; url = http://localhost/SAD/index.php");
           $output .= '<label class="text-success">' . $message . '</label>';  
		   
           $select_query = "SELECT * FROM employee ORDER BY id DESC";  
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
                $output .= '     <?php 
								<form action=delete.php method=POST>
                     <tr>  <input name="id" value="<?php $row[id];?>" hidden>
                          <td>' . $row["fname"] . '</td>  
						  <td>' . $row["lname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
						  <td><button type=submit name=delete class=btn btn-info btn-xs view_data del value=delete id=delete>delete</button></td>
									<input type="hidden" name="id" value=<?php echo $row[id]?>
                     </tr>  
					  </form>
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>