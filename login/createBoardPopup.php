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
<li><a href = "#tack" data-toggle="modal">Create Board</a></li>
  
 
 
  </ul>
</nav>
<form action="insertboard.php" name="createboard" method="post">
		<div class = "modal fade" id = "tack" role ="dialog">
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
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>
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