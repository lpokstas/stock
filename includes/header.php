<?php 

	if (isset($_SESSION["sessionUser"]))
	{
		echo "User online:" . $_SESSION["sessionUser"];
	}

		else
		{
			echo "Error: User is not connected" . "<br>";
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<a href="logout.php">Logout</a><br>

</body>
</html>