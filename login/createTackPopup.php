<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap 3</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/style.css" rel = "stylesheet">
		  
		

	</head>
	<body>


		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <ul class="nav navbar-nav">
  <li><a href="new.html" class="navbar-brand">
<img src="logo.png"></a></li>
<li><a href = "#tack" data-toggle="modal">Create Tack</a></li>
  
   





 
  </ul>
</nav>
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
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>
		<script type="text/javascript">

 function submitForm()
 {
       alert('sub');
       document.createtack.submit();
 }

</script>
		
		
	</form>	
	</body>
</html>