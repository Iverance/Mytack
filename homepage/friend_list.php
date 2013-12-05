<?php
	session_start();
    include ("db_config.php");
    
	//grab all tack data
	$result=$con->query("SELECT * FROM user");
	if (!$result) 
	{
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
			  
				<div class="col-sm-8 col-md-8 pull-center">
					<form class="navbar-form" role="search" id="srch_bar" action="search_result.php" method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="srch_term" id="srch_term">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit" onclick="searchSubmit()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
						<script type="text/javascript">
							function searchSubmit()
							{
								document.getElementById('srch_bar').submit();
							}
						</script>
					</form>
				</div>

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

		
		
		
		  <div class="col-md-2" >
			
			<!--the category section-->
			<div class="list-group center-block" style="margin:10px">
			  <h2>Category</h2>
			  <a href="#createboard" data-toggle="modal" class="list-group-item">Create Board</a>
			  <a href="all_board.php" class="list-group-item">My Board</a>
			  <a href="user_tack.php" class="list-group-item">My Tacks</a>
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
			<div class="panel panel-info">
				<div class="panel-heading">People</div>
				<ul class="media-list">
				
				
				<?php
					$tack_num=mysqli_num_rows($result);
					//echo mysqli_num_rows($result);
					 
						while($row = mysqli_fetch_array($result)) {
							if ($userName!=$row['userName']) 
							{
								echo 
								'<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="img/head.jpg" alt="...">
									</a>
									<div class="media-body">
										<h4 class="media-heading">'.$row['userName'].'</h4>
										<button class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
									</div>
								</li>';
							}
						}
				  ?>
				
				</ul>
				
				<script>
					$('.btn').on('click',function(e){
						$(e.target).removeClass('btn-success'); // activated list-item
						$(e.target).addClass('btn-success'); // activated list-item
					});
				</script>
				
			</div>
		  </div>

		
		<!--CreateBoard form-->
		<form action="insertboard.php" name="createboard" method="post">
			<div class = "modal fade" id = "createboard" role ="dialog">
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