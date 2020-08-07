
<?php
 // Open connection to database 
function OpenCon()
 {
 $dbhost = "sql302.epizy.com"; // our host. 
 $dbuser = "epiz_25181803"; // username for our account 
 $dbpass = "tU4m2JBkNfcAzP"; // password for our account
 $db = "epiz_25181803_database"; // our database's name 
 $mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $mysqli;
 }
    
// Close connection to database
function CloseCon($mysqli)
 {
 $mysqli -> close();
 }

?>
