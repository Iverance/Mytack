<?php
		// Create connection
			$con=mysqli_connect("testing.cm37sfvvvxih.us-west-2.rds.amazonaws.com",
								"admin","adminadmin","MyTack1");

			// Check connection
			if (mysqli_connect_errno($con)) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  exit();
			}
?>