<?php
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$sql="DELETE FROM tack WHERE tackId = ".$_GET["DtackId"];
		echo $sql;
		if (mysqli_query($con,$sql))
		{
			header( 'Location: ' .$_SERVER['HTTP_REFERER'] ) ;
		}
		else
		{
			die('Error: ' . mysqli_error($con));
		}
	}
?>