<!DOCTYPE html>
<html>
    <head>
		<script src="jQuery.js"></script>
		<script type="text/javascript" src="http://www.websnapr.com/js/websnapr.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_homepage.css">
		<title>MyTacks.com</title>
	</head>
	<body>
	
		<?php
			include ("db_config.php");
			
			//grab tack data
			$result=$con->query("SELECT * FROM tack WHERE boardId=".$_GET["boardId"]);
			$result_board=$con->query("SELECT * FROM board WHERE boardId=".$_GET["boardId"]);
			if (!$result||!$result_board) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}			
			/* free result set */
					//$result->close();
			mysqli_close($con);
		?>
	
		<nav class="navbar navbar-inverse" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand" >MyTacks.com</a>
		  </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-right">
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">UserName <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="#">About us</a></li>
				  <li><a href="#">Account Setting</a></li>
				  <li class="divider"></li>
				  <li><a href="#">Log Out</a></li>
				</ul>
			  </li>
			</ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
		
		
		<!--the category section-->
		  <div class="col-md-2">
			<!--the button set section-->
			<div class="btn-group-vertical center-block" style="margin:10px">
			  <a href = "#createboard" data-toggle="modal">
				<button type="button" class="btn btn-default" >Create Board</button>
			  </a>
			</div>
			
			
			<!--the category section-->
			<div class="list-group center-block" style="margin:10px">
			  <h2>Category</h2>
			  <a href="#" class="list-group-item active">
				Nu Jazz
			  </a>
			  <a href="#" class="list-group-item">R&B</a>
			  <a href="#" class="list-group-item">Rock & Roll</a>
			  <a href="#" class="list-group-item">House</a>
			  <a href="#" class="list-group-item">Techo</a>
			  <script>
				$('.list-group-item').on('click',function(e){
					var previous = $(this).closest(".list-group").children(".active");
					previous.removeClass('active'); // previous list-item
					$(e.target).addClass('active'); // activated list-item
				});
			  </script>
			</div>
		  </div>
		
			
			
		<!--Board Object-->
		  <div class="col-sm-12 col-md-10" >
			<div class="thumbnail">
			  <img src="img/board.jpg" alt="img/place1.jpg" width="1000" height="800">
			  <div class="caption">
				<?php
				 if(mysqli_num_rows($result)>0) {
					
				 }
				 else {
					echo "<h3><font color=\"grey\"> This is lonely here!!</font> </h3>";
				 }
				?>
					<div class="row">
						<div class="col-sm-4 col-md-2" >
							<a href = "#createtack" data-toggle="modal">
								<img src="img/plus.jpg" style="height:70px;width:70px;margin-left:10px" alt="...">
							</a>
						</div>
						<div class="col-sm-8 col-md-8" >
							<?php
								$board_info = mysqli_fetch_array($result_board);
								echo "<center><h1>".$board_info['BoardTitle']."</h1></center>";
							?>
						</div>
					</div>
					
					
					<hr style="border-color:#000000">
					<div class="row">
					 <?php
						$tack_num=mysqli_num_rows($result);
						//echo mysqli_num_rows($result);
						
							while($row = mysqli_fetch_array($result)) {
								
								echo "
								<div class=\"col-sm-6 col-md-4\">
								<div class=\"thumbnail\">
								<script>
									var thumbnail = 'http://images.websnapr.com/?url=".$row['url']."&key=bTmGswCsoBm9&hash=' + encodeURIComponent(websnapr_hash);
									document.write('<a target=\"_blank\" style=\"display: block; margin: 0.5cm\" href=\"".$row['url']."\"><img class=\"img-thumbnail\" src=\"'+thumbnail+'\"></a>');
								</script>
								<div class=\"caption\">
								<h4>".$row['tackName']."</h4>
								<p class=\"tackDes\">".$row['tackDescription']."</p>
								<p align=\"right\">
								<form>
								<a class=\"btn btn-danger \" role=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></a>
								<a class=\"btn btn-primary\" role=\"button\"><span class=\"glyphicon glyphicon-pushpin\"></span></a>
								</form>
								</p>
								</div>
								</div>
								</div>";
							}
					  ?>
							
					</div>
				</div>
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