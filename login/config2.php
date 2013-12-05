<?php

/*
//initalize database credentials   
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "MyTacksSystem";

//Connect to server, select DB, and verify
@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");
@mysql_selectdb("$db_name") or die ("No database");

//http://bootsnipp.com/password

*/
    
$db_host = "testing.cm37sfvvvxih.us-west-2.rds.amazonaws.com";
$db_username = "admin";
$db_pass = "adminadmin";
$db_name = "mytacks";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");
@mysql_selectdb("$db_name") or die ("No database");

?>