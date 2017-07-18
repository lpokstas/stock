<?php 

		if (isset($_COOKIE[session_name()])) {
			
			setcookie(session_name(), '', time()-86400, '/');

		}

			session_start();

				session_unset();

					session_destroy();

						



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="index.php">Log In</a>
</body>
</html>