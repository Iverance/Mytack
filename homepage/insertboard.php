
			  <?php
				include 'db_config.php';
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					//echo "inside post method";
					$boardname =($_POST["boardname"]);
					$boarddesc =($_POST["boarddesc"]);
					$setting =($_POST["setting"]);
					// echo $setting;
					$sql= "INSERT INTO board (UserId, BoardTitle, BoardSettings, BoardDesc) VALUES ('101' , '$boardname', '$setting', '$boarddesc')";
					
					if (!mysqli_query($con,$sql)) {
						die('Error: ' . mysqli_error($con));
					}
					else {
						header( 'Location: http://localhost/Mytack/homepage/all_board.php' ) ;	
					}
				}
				
			?>
				