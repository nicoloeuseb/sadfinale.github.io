<?php 
session_start();
$_SESSION["username"] = session_destroy();
   header("refresh: 0; url = http://localhost/sadfinal/sadloginadmin.html");
?>