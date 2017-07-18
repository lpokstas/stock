<?php 

	$server 	= "localhost";
	$ussername 	= "root";
	$password 	= "mysql";
	$db 		= "stock";

	// Connecting to DB

	$connection = mysqli_connect($server, $ussername, $password, $db);

	if (!$connection)
	 {
		die("Connecting to Database has failed" . mysqli_connect_error . "<br>");
	}

	echo "Connection established";

?>