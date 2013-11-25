<!DOCTYPE html>
<html>
    <head>
		<script src="jQuery.js"></script>
		<script type="text/javascript" src="http://www.websnapr.com/js/websnapr.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_homepage.css">
		<title>MyTacks.com</title>
	</head>
	<body>
		<?php
		// Create connection
			$con=mysqli_connect("testing.cm37sfvvvxih.us-west-2.rds.amazonaws.com",
								"admin","adminadmin","mytacks");

			// Check connection
			if (mysqli_connect_errno($con)) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  exit();
			}
			else{
				if ($result = $con->query("SELECT * FROM tack")) {
					while($row = mysqli_fetch_array($result))
					  {
					  //echo $row['tackName'];
					  //echo "<br>";
					  }

					/* free result set */
					$result->close();
				}
			}
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
			<a class="navbar-brand" href="#">MyTacks.com</a>
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!--<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Link</a></li>
			  <li><a href="#">Link</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			  </div>
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
				<ul class="dropdown-menu pull-right">
				  <li><a href="#">Action</a></li>
				  <li><a href="#">Another action</a></li>
				  <li><a href="#">Something else here</a></li>
				  <li class="divider"></li>
				  <li><a href="#">Separated link</a></li>
				</ul>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>-->
			<div class="col-lg-6" style="margin-top:8px">
			<div class="input-group">
			  <input type="text" class="form-control">
			  <div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
				<ul class="dropdown-menu pull-right">
				  <li><a href="#">Tack</a></li>
				  <li><a href="#">User</a></li>
				  <li><a href="#">Both</a></li>
				</ul>
			  </div><!-- /btn-group -->
			  <button type="submit" class="btn btn-default" style="margin-left:10px">
				<span class="glyphicon glyphicon-search"></span>
			  </button>
			</div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
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
		
		
		<div class="row">
		  <div class="col-md-2">
			<!--the button set section-->
			<div class="btn-group-vertical center-block" style="margin:10px">
			  <button type="button" class="btn btn-default">Create Tack</button>
			  <button type="button" class="btn btn-default">Create Board</button>
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
		  
		  
		  <div class="col-md-8">
		  
			<!--Tack Object-->
			<div class="row">
			  <div class="col-sm-6 col-md-4">
				<div href="#" class="thumbnail">

				  <!--The JS function to printout img by url-->
				  <script>
					function img_preview(url) {
						// Grab the URL from our link
						var apiKey = 'bTmGswCsoBm9', // This is Jeremy's websnapr APIkey
							thumbail;
						// Create image thumbnail using Websnapr thumbnail service
						thumbnail = 'http://images.websnapr.com/?url=' + url + '&key=' + apiKey + '&hash=' + encodeURIComponent(websnapr_hash);
						document.write('<a target="_blank" style="display: block; margin: 0.5cm" href="'+url+'"><img class="img-thumbnail" src="'+thumbnail+'"></a>');
					};
					img_preview("http://www.yahoo.com/");
				  </script>

					
				  <div class="caption">
					<h4>Title</h4>
					<p>This is description<p>
					<hr style="border-color:#000000">
					<ul class="media-list" >
					  <li class="media">
						<a class="pull-left" href="#">
						  <img class="media-object" src="img/head.jpg" alt="...">
						</a>
						<div class="media-body">
						  <h5 class="media-heading">Comment</h5>
						  
						</div>
					  </li>
					</ul>
					<p align="right">
					<a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-search"></span>	</a>
					</p>
				  </div>
				</div>

			  </div>
			</div>
		  
		  </div>
		</div>
		
		
			
			
			
		
		
		
	</body>

</html>