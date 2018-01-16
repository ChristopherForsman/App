<?php
	$connection = mysqli_connect('localhost', 'root', 'root', 'appdb');
	
	if (!$connection) {
	die('No connection.' . mysqli_error($connection));
	}
?>