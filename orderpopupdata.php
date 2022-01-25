<?php
require('db/pgconnect.php');
require('db/dbconnect.php');

$userid = $_POST['userid'];
$result_codcodes2 = pg_query($dbconn,"select * from order_dt where orderno=".$userid."");	

$response = "<table border='0' width='100%'>";
	$response .= '<thead>
							   <tr>
								 <th scope="col">ΚΩΔΙΚΟΣ</th>
								 <th scope="col">ΠΕΡΙΓΡΑΦΗ</th>
								 <th scope="col">ΠΟΣΟΤΗΤΑ</th>
								 <th scope="col">ΘΕΣΗ</th>
							   </tr>
						</thead>';
						
while($row2=pg_fetch_assoc($result_codcodes2)){
	
	$sf2=oci_parse($c,"select sti.codcode,sti.itmname, wit.witposition from sti,wit where sti.mciid=wit.mciid and wit.wrhid=7 and sti.mciid=" . $row2['mciid']. " order by wit.witposition"); 
	oci_execute($sf2);
	
	if ($row2['qtya']>0){
		$response .= "<tr>";
		while ($row3=oci_fetch_row($sf2))
		{	
		$response .= "<td>".$row3[0]."</td>";
		
		if (strlen($row3[1]) > 50){
		$response .= "<td>".substr($row3[1], 0, 50) . '...'."</td>";
		}else{
		$response .= "<td>".$row3[1]."</td>";	
		}
		$response .= "<td>".round($row2['qtya'],0)."</td>";
		$response .= "<td>".$row3[2]."</td>";
		}
		$response .= "</tr>";
	}
}


$response .= "</table>";

echo $response;
exit;

?>