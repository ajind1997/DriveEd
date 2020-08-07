
<?php
 // Open connection to database 
 //When running locally the credentails need to be changed to match the server it is being run on
 
function OpenCon()
 {
 $dbhost = "localhost"; // our host. 
 $dbuser = "root"; // username for our account 
 $dbpass = ""; // password for our account
 $db = "database"; // our database's name 
 $mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $mysqli;
 }
    
// Close connection to database
function CloseCon($mysqli)
 {
 $mysqli -> close();
 }

?>
