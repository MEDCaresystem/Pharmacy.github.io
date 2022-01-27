<?php
	$conn = new mysqli("localhost","root","","cart-system");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>