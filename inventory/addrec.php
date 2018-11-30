<?php
	
	
	$conn= mysqli_connect('localhost', 'root', '', 'sad');
	
	if(!$conn){
		die('Connection failed: ' .mysqli_connect_error());
	}
