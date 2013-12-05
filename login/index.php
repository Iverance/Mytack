<?php

    include("config2.php");

?>
<!DOCTYPE html>   
<html>
  <head>
    <title>MyTacks System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body> 
    <!-- <h1>Hello, world!</h1>-->
    <script src="http://code.jquery.com/jquery.js"></script>
    
    <!-- Custom CSS for the 'Full Width Pics' Template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
  </head>

  <body>

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
          <ul class="nav navbar-nav">
            <!--<li><a href="#about"></a></li>
            <li><a href="#services">Learn More</a></li> -->
            <li><a href="register.php">Register</a></li>
            <li><a href="Contact/contact.php">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

    <div class="full-width-image-1">

      <div class="logo-wrapper">
        <img src="http://placehold.it/200x200&text=Logo" align="absmiddle" class="img-responsive" / >
      </div>

    </div><!-- /full-width-image-1 -->

    
           <div class="container">
	<div class="row" style="margin-top:10px;">
		<div class="col-md-4 col-md-offset-4">
			
			<form method="POST" action="checklogin.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">
                            <input name="_token" type="hidden" value="GjBJTkLmD95trVYO4nUvfxiZKuhQcQxegyyUmD2W">
                        <fieldset>
			  		<h2 class="sign-up-title"><center>MyTacks Sign In</center></h2>
			  		<hr class="colorgraph">
					<font color="red"><center>
					<?php $reasons = array("passwordErr" => "Wrong Username or Password!", "blank" => "You have left one or more fields blank.");
					    if (!empty($_GET['login']) && $_GET['login'] == "failed" )
						echo $reasons[$_GET["reason"]];
					?></center>
					<font color="black">
				    <input class="form-control email-title" placeholder="Username" name="username" type="text" id = "username">
                                        <input class="form-control" placeholder="Password" name="password" type="password" id = "password" value="">
                                            <p class="text-center"><a href="http://bootsnipp.com/password">Forgot password?</p></a>
				    <input class="btn btn-lg btn-success btn-block" name = "Submi" type="submit" value="Login">
					<br>
				  	<p class="text-center"><a href="register.php">Register for an account?</a></p>
			</fieldset>
		  	</form>
                </div>
  	</div>
</div>
    </div>

<div class="full-width-image-2">
      <!-- box content goes here if you want to put text or a button in here -->
    </div><!-- /full-width-image-2 -->
    
      <div class="container">
        <div class="row">
          <div class="col-lg-12 section">
          </div>
      </div>
    </div>

    
    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>