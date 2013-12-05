<?php
    session_start();
    include('config2.php');
    
    $userName = "".$_SESSION['username']."";

    //grab tack data
    $result="SELECT * FROM tack WHERE userName='$userName'";
        
    if (!$result) {
	echo 'Could not run query: ' . mysql_error();
	exit;
    }	    
?>
<!DOCTYPE html>
<html>
    <head>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>
                <script src="jQuery.js"></script>
                <script src="js/jquery-2.0.3.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="http://www.websnapr.com/js/websnapr.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_homepage.css">
		<title>MyTacks.com</title>

    </head>
	<body>
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
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

		  <div class="collapse navbar-collapse navbar-ex1-collapse pull-right">
                  <dl class="nav navbar-nav">
                    <li><a href="Contact/contact.php">Contact</a></li>
                    <li><a href="logout.php">Logout <?php echo $userName;?></a></li>
                  </dl>
                  
                  
                </div><!-- /.navbar-collapse -->
                
              </div><!-- /.container -->
            </nav>
            <br><br><br><br>
            
		
		<!-- Left Sidebar -->
		<div class="row">
		  <div class="col-md-2">
			<!--the button set section-->
			<div class="btn-group-vertical center-block" style="margin:10px">
			  <a href = "#creatboard" data-toggle="modal">
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
    
    		  <div class="col-md-8">
		  <div class="row">
		  <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				<a href = "#tack" data-toggle="modal">
					<img src="img/plus.jpg" style="height:200px;width:200px;display: block; margin: 0.5cm">
				</a>
					
				  <div class="caption">
					<h4> Create New Tack</h4>
					<a href = "#tack" data-toggle="modal"> Click to create a new tack.</a>
				  </div>
				</div>
		  </div>
                  
		  <?php
			$tack_num=1;
			//echo mysqli_num_rows($result);
			$row = 0;
                            if($row > 0){
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
					<p>".$row['tackDescription']."<p>
					<p align=\"right\">
					<a class=\"btn btn-primary\" role=\"button\"><span class=\"glyphicon glyphicon-pushpin\"></span>	</a>
					</p>
					</div>
					</div>
					</div>";
				}
                            }
		  ?>
    <!--This is a create tack pop-up form-->
<form action="inserttack.php" name="createtack" method="post">
		<div class = "modal fade" id = "tack" role ="dialog">
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
						<input type="text" name="tackURL" id="tackURL"  maxlength="12"/><br><br>							
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
			<!--Tack Object-->
			<!-- <div class="caption">
			  <div class="col-sm-6 col-md-4">
				<div class="thumbnail">

				  <!--The JS function to printout img by url
				  
                                  <script>
					function img_preview(url) {
						var apiKey = 'bTmGswCsoBm9',
							thumbail;
						thumbnail = 'http://images.websnapr.com/?url=' + url + '&key=bTmGswCsoBm9&hash=' + encodeURIComponent(websnapr_hash);
						document.write('<a target="_blank" style="display: block; margin: 0.5cm" href="'+url+'"><img class="img-thumbnail" src="'+thumbnail+'"></a>');
					};
					img_preview("http://www.yahoo.com/");
				  </script>

					
				  
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

                  </div>-->
			
		  
		  </div>
		</div>
		</div>
		


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
						<a class = "btn btn-primary" data-dismiss = "modal" onclick="submitForm();">Create</a>
						
					
				</div>
				</div>
			</div>
			</div>

			<script type="text/javascript" src="jquery.min.js"></script>
                        <script type="text/javascript">                        
                        function submitForm()
			 {
				   alert('sub');
				   document.createboard.submit();
			 }
                         
			</script>
		</form>			
	
	</body>

</html>