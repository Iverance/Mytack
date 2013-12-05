<?php

ob_start();
include ("config2.php");

// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM user WHERE userName='$username' AND userPassword='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

    // Register $username, $password and redirect to file "homepage.php"
    $_SESSION['login_user']="username";
    $_SESSION['login_user']="password";
    
    header("location: homepage.php");
} else {
    die(header("location:index.php?loginFailed=true&reason=passwordErr"));    
}

ob_end_flush();

?>