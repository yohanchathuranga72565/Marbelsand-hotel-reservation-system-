<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'hotel_marble_sand'; 

	$connection = mysqli_connect('localhost', 'root', '', 'hotel_marble_sand');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	}

?>