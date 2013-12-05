 <!--- CONNECT AND CONFIGURE OUR DATABASE --->
<?php
    
$db_host = "testing.cm37sfvvvxih.us-west-2.rds.amazonaws.com";
$db_username = "admin";
$db_pass = "adminadmin";
$db_name = "mytacks";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");
@mysql_selectdb("$db_name") or die ("No database");

?>