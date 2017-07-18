<?php 

session_start();

include ("includes/connection.php");
include ("includes/functions.php");

//Login in

if (isset($_POST["login"]))
 {
	$formEmail 		= validateFormData ($_POST["formEmail"]);
	$formPassword 	= validateFormData ($_POST["formPassword"]);
	$query 			="SELECT
					  userName, userHashedPassword, userEmail
					  FROM 
					  users 
					  WHERE 
					  userEmail = '$formEmail' ";

	$result 		= mysqli_query ($connection, $query);

		if (mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
			  $user 	= $row["userName"];
			  $email 	= $row["userEmail"];
			  $password = $row["userHashedPassword"];

			  	if ($formPassword == $password)
			  	{
			  	  $_SESSION["sessionUser"] = $user;
					header("Location: stockmanagement.php");			  	  	
			  	}
			  		else
			  		{
			  			echo "Wrong password, please try again";
			  		}
			}
		}
			else
			{
				echo "Email does not exist, please try again";
			}
 }

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
</head>
<body>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" 		name="formEmail" 	placeholder="Enter your email">
	<input type="password" 	name="formPassword" placeholder="Enter your password">
	<input type="submit" 	name="login" 		value="Log in">
	</form>>

</body>
</html>>
