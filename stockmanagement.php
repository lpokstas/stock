<?php 

session_start();

include ("includes/connection.php");
include ("includes/functions.php");
include ("includes/header.php");

if (!$_SESSION["sessionUser"])
 {
	header("Location: index.php");
 }
?>


<!DOCTYPE html>
<html>
<head>
	<title>STOCK MANAGEMENT</title>
</head>
<body>

<h1>STOCK MANAGEMENT</h1>

<table border="6">
	
	<tr>
	
	<td>Box</td>
	<td>Airport</td>
	<td>AWB</td>
	<td>City</td>
	<td>Reference</td>
	<td>Temperature</td>
	<td>Logger</td>
	<td>Time</td>

	</tr>
		
<?php

	$query 	= "SELECT *
			   FROM boxes, stockTracking, loggers";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{   //DB tik viena rusis. Padaryti, kad butu rodomas selected rusis !!!
			$boxName		  	  = $row["boxName"];
			$airportOfDestination = $row["airportOfDestination"];
			$awb 				  = $row["awb"];
			$cityOfDestination 	  = $row["cityOfDestination"];
			$reference 			  = $row["reference"];
			$time 				  = $row["time"];
			$loggerName 		  = $row["loggerName"];
			$temp 				  = $row["temp"];

				echo "<tr>";

					echo "<td>" . $boxName . "</td>" . 
						 "<td>" . $airportOfDestination . "</td>" . 
						 "<td>" . $awb . "</td>" . 
						 "<td>" . $cityOfDestination . "</td>"	. 
						 "<td>" . $reference . "</td>" . 
						 "<td>" . $temp . "</td>" . 
						 "<td>" . $loggerName . "</td>" . 
						 "<td>" . $time . "</td>";

					echo "<td><a href='edit.php?entryId=" . $row["entryId"] ."'> Edit </a></td>";

				echo "</tr>";
		}
	}

var_dump($result);
?>

</table>



<a href="">Add new entry</a><br>
<a href="">View stock</a><br>
<a href="">Add/remove stock</a><br>
<a href="">Add/remove user</a><br>

</body>
</html>

<?php
include ("includes/back.php");
mysqli_close($connection);

?>