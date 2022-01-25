<?php
	
$dbconn = pg_connect("host=100.100.1.203 port=5432 dbname=diellas user=fakiolas password=sotiris");
 if ($dbconn) {
 //echo "Successfully connected to Postgre.";
 } else {
  //echo "Postgre Connect Error ";
 }
	
?>