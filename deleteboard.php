<?php
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$sql="DELETE FROM board WHERE BoardId = ".$_GET["DboardId"];
		echo $sql;
		if (mysqli_query($con,$sql))
		{
			header( 'Location: ' .$_SERVER['HTTP_REFERER'] ) ;
		}
		else
		{	
			header( 'Location: all_board.php?sqlerror=foreign' );
			//die('Error: ' . mysqli_error($con));
		}
	}
?>