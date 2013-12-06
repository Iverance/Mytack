<?php

	include ("db_config.php");
	session_start();
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			if(isset($_SESSION['username'])) {
				$userName = "".$_SESSION['username']."";
				$result_user=$con->query("SELECT * FROM user WHERE userName='$userName'");
				if (!$result_user) 
				{
					echo 'Could not run query?: ' . mysql_error();
					exit;
				}
				else 
				{
					$user_info=mysqli_fetch_array($result_user);
					$userId = $user_info['userId'];
				}
			}
			
			//echo "inside post method";
			$tackname =($_POST["tackname"]);
			$tackdesc =($_POST["tackdesc"]);
			$setting =($_POST["settings"]);
			$tackURL = ($_POST["tackURL"]);
			if($_GET["boardId"]) {
				$boardId=$_GET['boardId'];
			}
			else {
				$boardId=1;
			}
			// echo $setting;
			$sql= "INSERT INTO tack ( tackName,tackDescription,tackSettings,boardId,userId,url) VALUES ('$tackname','$tackdesc','$setting','$boardId','$userId','$tackURL')";
			if (!mysqli_query($con,$sql)) {
				die('Error: ' . mysqli_error($con));
			}
		}
		header( 'Location: ' .$_SERVER['HTTP_REFERER'] ) ;
?>