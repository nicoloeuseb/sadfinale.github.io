<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$usernameem = filter_input(INPUT_POST, 'username');

$fname = filter_input(INPUT_POST, 'fname');
$user = filter_input(INPUT_POST, 'user');

if (!empty($username) && !empty($password)) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "SAD";

  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
  // include "login.php";
  session_start();
  $_SESSION = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
	

    if (isset($_POST['admin_btn'])) {

      $sql = "SELECT * FROM admin WHERE user = '$username' and pass = '$password'";
      $result = mysqli_query($conn, $sql)
      or die("Error: " . mysqli_error($conn));
	  
      while($row = mysqli_fetch_assoc($result)):
      $active = $row['user'];
	  endwhile;

      $count = mysqli_num_rows($result);

      if ($count == 1) {
       // $_SESSION['login_user'] = $username;
		
        $records = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $username;
		header("refresh: 1; url = http://localhost/sadfinal/inventory/inventoryadmin.php");
		//header("refresh: 1; url = "http://localhost/sadfinal/inventoryadmin.php");

        // header("location: welcome.php");
      } else {
        $error = "Your Login Name or Password is invalid";
        echo "<script>alert('Your Login Name or Password is invalid');</script>";

        header("refresh: 0; url = SadLoginAdmin.html");
      }
    } //end of admin login	

	
// employee login
    if (isset($_POST['employee_btn'])) {

      $sql = "SELECT * FROM employee WHERE user = '$usernameem' and pass = '$password'";
      $result = mysqli_query($conn, $sql)
      or die("Error: " . mysqli_error($conn));
      $row = mysqli_fetch_assoc($result);
      $active = $row['user'];

      $count = mysqli_num_rows($result);

      if ($count == 1) {
		  $records = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $usernameem;
		
		
		 header("refresh: 1; url = http://localhost/sadfinal/employee/inventoryemployee.php");
       //  header("location: welcome.php");
      } else {
		  echo "<script>alert('username or password incorrect!');</script>";
		  echo "<script>location.href='SadLoginEmployee.html'</script>";
       // $error = "Your Login Name or Password is invalid";
        //echo $error;

        //header("refresh: 2; url = SadLoginEmployee.html");
      }
    }

    if (isset($_POST['customer_btn'])) {

      $sql = "SELECT * FROM customer WHERE user = '$username' and pass = '$password'";
      $result = mysqli_query($conn, $sql)
      or die("Error: " . mysqli_error($conn));
	  
      while($row = mysqli_fetch_assoc($result)):
      $active = $row['user'];
	  endwhile;

      $count = mysqli_num_rows($result);

      if ($count == 1) {
		  $sql = "SELECT * FROM CUSTOMER where fname='$fname'";
		   $records = mysqli_fetch_assoc($result);
		    
        $_SESSION["username"] = $username;
       // $_SESSION['login_user'] = $username;
	   /*$date=date('Y,d,m');
        echo "You're in! $active";
		$qry="INSERT date INTO transaction values ('$date')";
		mysqli_query($conn,$qry);*/
		header("refresh: 1; url = http://localhost/sadfinal/orders2/index.php");

        // header("location: welcome.php");
      } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
		echo '<font color="#FF0000"><p align="center">INVALID USERNAME OR PASSWORD!!!</p></font>';

        header("refresh: 2; url = SadLoginCustomer.html");
      }
    }
  }
}
?>