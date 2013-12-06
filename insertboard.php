<?php
	include 'db_config.php';
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{	
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
		$boardname =($_POST["boardname"]);
		$boarddesc =($_POST["boarddesc"]);
		$setting =($_POST["setting"]);
		// echo $setting;
		$sql= "INSERT INTO board (UserId, BoardTitle, BoardSettings, BoardDesc) VALUES ('$userId' , '$boardname', '$setting', '$boarddesc')";

		if (!mysqli_query($con,$sql)) 
		{
			die('Error: ' . mysqli_error($con));
		}
		else 
		{
			header( 'Location: http://localhost/Mytack/homepage/all_board.php' ) ;	
		}
	}

?>
				