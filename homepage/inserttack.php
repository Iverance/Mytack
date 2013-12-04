<?php

	include ("db_config.php");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//echo "inside post method";
			$tackname =($_POST["tackname"]);
			$tackdesc =($_POST["tackdesc"]);
			$setting =($_POST["settings"]);
			$tackURL = ($_POST["tackURL"]);
			// echo $setting;
			$sql= "INSERT INTO tack ( tackName,tackDescription,tackSettings,boardId,userId,url) VALUES ('$tackname','$tackdesc','$setting','1','101','$tackURL')";
			if (!mysqli_query($con,$sql)) {
				die('Error: ' . mysqli_error($con));
			}
		}
		header( 'Location: ' .$_SERVER['HTTP_REFERER'] ) ;
?>