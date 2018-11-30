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
	

    if (isset($_POST['customer_btn'])) {

      $sql = "SELECT * FROM customer WHERE user = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($conn, $sql)
      or die("Error: " . mysqli_error($conn));
	  
      /*while($row = mysqli_fetch_assoc($result)):
      $active = $row['user'];
	  endwhile;*/


      $count = mysqli_num_rows($result);

      if ($count == 1) {
       // $_SESSION['login_user'] = $username;
		
        $records = mysqli_fetch_assoc($result);
        //$_SESSION["username"] = $myusername;
        $_SESSION["username"] = $records["user"];
        $_SESSION["id"] = $records["id"];
		//header("refresh: 1; url = http://localhost/sad/inventoryadmin.php");
		header("refresh: 1; url = http://localhost/sadfinal/orders2/index2.php");

        // header("location: welcome.php");
      } else {
        $error = "Your Login Name or Password is invalid";
           echo "<script>alert('Your Login Name or Password is invalid');</script>";

        header("refresh: 0; url = SadLoginCustomer.html");
      }
    }
  }
}
	?>