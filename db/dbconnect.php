<?php
	
putenv("NLS_LANG=GREEK.UTF8");
$c = oci_connect("S01001", "S01001", "100.100.1.2:1521/sen");
 if ($c) {
  //echo "Successfully connected to Oracle.";
   //oci_close($c);
 } else {
   $err = oci_error();
   echo "Oracle Connect Error " . $err['text'];
 }
	
?>