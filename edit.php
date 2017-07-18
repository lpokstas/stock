<!DOCTYPE html>
<html>
<head>
	<title>Entry correction</title>
</head>

<body>

<?php 

session_start();

include ("includes/connection.php");
include ("includes/functions.php");
include ("includes/header.php");
include ("includes/back.php");

if (!$_SESSION["sessionUser"])
 {
	header("Location: index.php");
 }

$updateEntryId 	= $_GET["entryId"];
$query          = "SELECT * 
               FROM stockTracking s
               LEFT JOIN loggers c
               ON s.entryId=c.loggerId 
               LEFT JOIN boxes b
               ON b.boxId=s.entryId 
               WHERE s.entryId='{$updateEntryId}'";
$result 		= mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_assoc($result))
	{
		$updateBoxName		  	      = $row["boxName"];
		$updateAirportOfDestination   = $row["airportOfDestination"];
		$updateAwb 				 	  = $row["awb"];
		$updateCityOfDestination 	  = $row["cityOfDestination"];
		$updateReference 			  = $row["reference"];
		$updateTime 				  = $row["time"];
		$updateLoggerName 		      = $row["loggerName"];
		$updateTemp 				  = $row["temp"];

			if (isset($_POST["update"]))
			{
				$updateBoxName 					= validateFormData($_POST["updateBoxName"]);
				$updateAirportOfDestination 	= validateFormData($_POST["updateAirportOfDestination"]);
				$updateAwb 						= validateFormData($_POST["updateAwb"]);
				$updateCityOfDestination 		= validateFormData($_POST["updateCityOfDestination"]);
				$updateReference				= validateFormData($_POST["updateReference"]);
				$updateTime 					= validateFormData($_POST["updateTime"]);
				$updateLoggerName 				= validateFormData($_POST["updateLoggerName"]);
				$updateTemp 					= validateFormData($_POST["updateTemp"]);

						$query ="UPDATE stockTracking s
								 LEFT JOIN loggers c
								 ON s.entryId=c.loggerId
								 LEFT JOIN boxes b
								 ON b.boxId=s.entryId
								 SET b.boxName 				= '$updateBoxName',
					 	 	  	  s.airportOfDestination 	= '$updateAirportOfDestination',
					 	 	  	  s.awb 					= '$updateAwb',
					 	 	  	  s.cityOfDestination 		= '$updateCityOfDestination',
					 	 	  	  s.reference 				= '$updateReference',
					 	 	  	  s.time 					= '$updateTime',
					 	 	  	  c.loggerName 				= '$updateLoggerName',
					 	 	  	  s.temp 					= '$updateTemp'
						 	  	WHERE s.entryId 			= '$updateEntryId'";
						
						$result = mysqli_query($connection, $query);

							if ($result)
							{
								header("Location: stockmanagement.php");
							}

								else
								{
									echo "Error" . mysqli_error($connection);
								}
			}
	}
}

else
{
	echo "No records";
}

 var_dump($query);

?>

<h1>ENTRY CORECTION</h1>

<table>
	
<tr>
	
<td>BoxName</td>
<td>airportOfDestination</td>
<td>awb</td>
<td>cityOfDestination</td>
<td>reference</td>
<td>time</td>
<td>loggerName</td>
<td>temp</td>

</tr>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?entryId=<?php echo $updateEntryId; ?>">

		<td><input type="text" value="<?php echo $updateBoxName?>"></td>
		<td><input type="text" value="<?php echo $updateAirportOfDestination?>"></td>
		<td><input type="text" value="<?php echo $updateAwb?>"></td>
		<td><input type="text" value="<?php echo $updateCityOfDestination?>"></td>
		<td><input type="text" value="<?php echo $updateReference?>"></td>
		<td><input type="text" value="<?php echo $updateTime?>"></td>
		<td><input type="text" value="<?php echo $updateLoggerName?>"></td>
		<td><input type="text" value="<?php echo $updateTemp?>"></td>
		<td><input type="submit" value="Update" name ="update"></td>


	</form>

</table>


</body>
</html>
<?php mysqli_close($connection); ?>