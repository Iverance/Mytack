<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$sql="DELETE FROM tack WHERE tackId = '260'";
		if (mysql_query($sql))
					{
						echo " deleted 1 row ";
					}
		else
		{
			echo "error occurred!!"
		}
	}
?>