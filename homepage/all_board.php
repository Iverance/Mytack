<?php
	session_start();
	include ("db_config.php");
	
	//grab tack data
	$result=$con->query("SELECT * FROM board");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}			
	
	if(isset($_SESSION['username'])) {
		$userName = "".$_SESSION['username']."";
	}
	
	/* free result set */
			//$result->close();
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
    <head>
		<script src="jQuery.js"></script>
		<script type="text/javascript" src="http://www.websnapr.com/js/websnapr.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_homepage.css">
		<title>MyTacks.com</title>
	</head>
	<body class="mainBGcolor">
		
		<!-- NAVIGATION BAR -->
		<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		  <div class="container" >
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php" >MyTacks Inc.</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
			  
				

				<div class="collapse navbar-collapse navbar-ex1-collapse pull-right">
				  <dl class="nav navbar-nav">
					<li><a href="Contact/contact.php">Contact</a></li>
					<li><a href="logout.php">Logout 
						<?php 
							if(isset($_SESSION['username'])) {
								echo $userName;
							}
						?></a></li>
				  </dl>
				  
				  
				</div><!-- /.navbar-collapse -->
			</div>
			
		  </div><!-- /.container -->
		</nav>
		<br><br><br><br>
		
		
		
		  <div class="col-md-2">
			
			<!--the category section-->
			<div class="list-group center-block" style="margin:10px">
			  <h2>Category</h2>
			  <a href="#createboard" data-toggle="modal" class="list-group-item">Create Board</a>
			  <a href="#" class="list-group-item">My Board</a>
			  <a href="#" class="list-group-item">My Tacks</a>
			  <a href="#" class="list-group-item">Search Friends</a>
			  <script>
				$('.list-group-item').on('click',function(e){
					var previous = $(this).closest(".list-group").children(".active");
					previous.removeClass('active'); // previous list-item
					$(e.target).addClass('active'); // activated list-item
				});
			  </script>
			</div>
		  </div>
		  

		  <div class="col-md-8">
		  <div class="row">
		  <?php
			$tack_num=1;
			//echo mysqli_num_rows($result);
			
				while($row = mysqli_fetch_array($result)) {
					
					echo "
					<div class=\"col-sm-6 col-md-12\">
					<a href=\"board.php?boardId=".$row['BoardId']."\">
					<div class=\"thumbnail\">
					<img src=\"img/board.jpg\" class=\"img-thumbnail\" >
					<div class=\"caption\">
					<h4>".$row['BoardTitle']."</h4>
					</div>
					</div>
					</a>
					</div>";
				}
		  ?>
			
		  
		  </div>
		</div>
		
		
		
		<!--CreateTack form-->
		<form action="inserttack.php" name="createtack" method="post">
		<div class = "modal fade" id = "createtack" role ="dialog">
			<div class ="modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Create a Tack</h4>
					</div>
					<div class ="modal-body">
					<b>Enter Tack Name: </b>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="tackname" id="tackname"  maxlength="12"/><br><br>							
						<b>Tack Description: </b>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="tackdesc" id="tackdesc" maxlength="12"/><br><br>
						<b>Enter Tack URL: </b>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="tackURL" id="tackURL"  maxlength="100"/><br><br>							
						<b>Privacy Settings: </b>
						    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="settings">
							<option value="private" >Private</option>
							<option value="public">Public</option>
						</select><br></br>						
					</div>
					<div class = "modal-footer">
						<a class = "btn btn-default" data-dismiss = "modal">Cancel</a>
						<a class = "btn btn-primary" data-dismiss = "modal" onclick="submitForm();">Create</a>
					</div>
				</div>
			</div>
			</div>

			<script type="text/javascript">

			 function submitForm()
			 {
				   alert('sub');
				   document.createtack.submit();
			 }
			</script>
		</form>	
		

		<form action="insertboard.php" name="create" method="post">
			<div class = "modal fade" id = "creatboard" role ="dialog">
			<div class ="modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Create a Board</h4>
					</div>
					<div class ="modal-body">
						<fieldset>
					<legend><i>Enter Board Details:</i></legend>
					<center>
					
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b>Enter Board Name: </b>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="boardname" id="boardname"  maxlength="20"/><br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b>Enter Description: </b>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="boarddesc" id="boarddesc" maxlength="100"/><br><br>
						<b>Select the Privacy Settings: </b>
						<select name="setting">
							<option value="private">Private</option>
							<option value="public">Public</option>
						</select>
					
					</center>
				</fieldset>	
					</div>
					<div class = "modal-footer">
						<a class = "btn btn-default" data-dismiss = "modal">Cancel</a>
						<a class = "btn btn-primary" data-dismiss = "modal" onclick="submitForm1();">Create</a>
						
					
				</div>
				</div>
			</div>
			</div>

			<script type="text/javascript">
			 function submitForm1()
			 {
				   alert('sub');
				   document.createboard.submit();
			 }
			</script>
		</form>	
		
	</body>

</html>