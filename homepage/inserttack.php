<!DOCTYPE html>
<html>
    <head>
		<script src="jQuery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_homepage.css">
		<title>MyTacks.com</title>
	</head>
	<body>
		
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
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Link</a></li>
			  <li><a href="#">Link</a></li>
			</ul>
			<!--<form class="navbar-form navbar-left" role="search">
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
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></button>
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
		
		
		<!--the category section-->
		<div class="list-group" align="left" style="margin-left:20px;height:100%;width:15%;float:left;">
		  <h2>Category</h2>
		  <a href="#" class="list-group-item active">
			Nu Jazz
		  </a>
		  <a href="#" class="list-group-item">R&B</a>
		  <a href="#" class="list-group-item">Rock & Roll</a>
		  <a href="#" class="list-group-item">House</a>
		  <a href="#" class="list-group-item">Techo</a>
		</div>
			
			
		<!--Tack Object-->
		<!--<div class="row" style="margin-top:50px;margin-left:50px;float:left;">-->
		  <div class="col-sm-5 col-md-8" style="margin-left:40px;margin-top:10px;height: 1000px; width: 1000px">
			<div class="thumbnail">
			  <img src="img/place1.jpg" alt="img/place1.jpg" width="1000" height="800">
			  <div class="caption">
			  <?php
				//include 'config.php';
				$db_host = "testing.cm37sfvvvxih.us-west-2.rds.amazonaws.com";
				$db_username = "admin";
				$db_pass = "adminadmin";
				$db_name = "mytacks";
				$con=mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die ("Could not connect to MySQL");
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					//echo "inside post method";
					$tackname =($_POST["tackname"]);
					$tackdesc =($_POST["tackdesc"]);
					$setting =($_POST["settings"]);
					$tackURL = ($_POST["tackURL"]);
					// echo $setting;
					$sql= "INSERT INTO tack ( tackId,tackName,tackDescription,tackSettings,boardId,userId,url) VALUES ('260', '$tackname','$tackdesc','$setting','1','100','$tackURL')";
					if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
 
					//echo"<br><br><br><br>Hurraaahh insert done!!";
				}
			?>
				
				<h3><font color="grey"> This is lonely here!!</font> </h3>
					<ul class="media-list" >
						<li class="media">
							<a class="pull-left" href="#">
								<img src="img/plus.jpg" height = "200" width ="200" alt="...">
							</a>
						</li>
					</ul>
				</div>
		</div>
	</div>
			
			
			
		 
		 <!--</div>-->
		
		
	</body>

</html>