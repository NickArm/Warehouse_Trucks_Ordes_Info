<!DOCTYPE html>
<html lang="el"> 
	<meta http-equiv="refresh" content="300; url=index.php">
	<?php include 'head.php';?>
	<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>	
	<body>
     <?php require('db/pgconnect.php'); ?>
	 <?php require('db/dbconnect.php'); ?>
	<div class="main-wrapper">
			  <div class="card card-body">		
			<?php
		/*$result_codcodes = pg_query($dbconn,"select routes.rid, routes.driver, order_hd.traid, routes.arrival ardate, prom_days.owner, order_hd.paletes , order_hd.volume  from routes, routeorder,order_hd , prom_days where routes.rid = routeorder.rid and routeorder.oid = order_hd.orderno and prom_days.traid=order_hd.traid ORDER BY ardate ASC, routes.rid ASC");*/
		$result_codcodes = pg_query($dbconn,"select routes.rid, routes.driver, order_hd.traid, routes.arrival ardate, prom_days.owner, order_hd.paletes , order_hd.volume, order_hd.orderno  from routes, routeorder,order_hd , prom_days where routes.rid = routeorder.rid and routeorder.oid = order_hd.orderno and prom_days.traid=order_hd.traid and routes.arrival < CURRENT_DATE + 15
UNION SELECT 0,'',order_hd.traid,PLACEDATE+DAYS,prom_days.owner, order_hd.paletes , order_hd.volume, order_hd.orderno FROM ORDER_HD,PROM_DAYS WHERE ORDER_HD.TRAID=PROM_DAYS.TRAID AND order_hd.ishere=false and order_hd.isdeleted=false and order_hd.orderno NOT IN(select oid from routeorder) and prom_days.traid=order_hd.traid and PLACEDATE+DAYS < CURRENT_DATE + 15
ORDER BY ardate ASC, rid ASC");		
			?>
					<?php
					echo '<table id="table-custom-2" class="table display table-striped">';
						echo '<thead>
							   <tr>
								 <th scope="col">ΟΔΗΓΟΣ</th>
								 <th scope="col">ΟΔΗΓΟΣ</th>
								 <th scope="col">ΠΡΟΜΗΘΕΥΤΗΣ</th>
								 <th scope="col">ΠΑΛΕΤΕΣ</th>
								<th scope="col">ΑΦΙΞΗ</th>
								<th scope="col">ΑΦΙΞΗ</th>
								<th scope="col">ΑΦΙΞΗ</th>
						
							   </tr>
						</thead>';
						
					while($row=pg_fetch_assoc($result_codcodes)){
						
					if ($row['rid']== 10){
					
						echo "<tr class='userinfo' style='background-color: #4663ff!important;' data-toggle='modal' data-id='".$row['orderno']."' data-target='#orderModal'>";
					}else{
						echo "<tr class='userinfo' data-toggle='modal' data-id='".$row['orderno']."' data-target='#orderModal'>";
					}
						echo "<td style='display:none;'></td>";
						$myDateTime = DateTime::createFromFormat('Y-m-d', $row['ardate']);
						$newDateString = $myDateTime->format('d/m'); 

						echo "<td style='font-weight: 700;'>" . $newDateString . "</td>";	
						echo "<td>" . $row['driver'] . "</td>";
						$sf=oci_parse($c,"select leename, CNTID from sup, lee where sup.leeid=lee.leeid and  traid=" . $row['traid']. ""); 
						oci_execute($sf);	
	
						while ($row2=oci_fetch_row($sf))
						{	
							
							if (strlen($row2[0]) > 55){
							echo "<td>".substr($row2[0], 0, 55) . '...'."</td>";
							}else{
								echo "<td>".$row2[0]."</td>";
							}
						}
						if ($row['owner']== 'A'){
							echo "<td>ΑΡΗΣ</td>";	
						}else if ($row['owner']== 'T'){
							echo "<td>ΘΑΝΑΣΗΣ</td>";
						}else if (($row['owner']== 'F') or ($row['owner']== 'M')){
							echo "<td>ΛΕΩΝΙΔΑΣ</td>";
						}else if ($row['owner']== 'V'){
							echo "<td>ΒΑΓΓΕΛΗΣ</td>";
						}else{
							echo "<td></td>";
						}
						if (($row['paletes']=== NULL) AND ($row['volume']==! NULL)){
							echo "<td>" . $row['volume'] . " <span style='font-size: 70%;'>M3</span></td>";
						}elseif (($row['paletes']==! NULL) AND ($row['volume']=== NULL)) {
							echo "<td>" . $row['paletes'] . " <span style='font-size: 70%;'>ΠΑΛ</span></td>";
						}else {
							echo "<td></td>";
						}
						if( $row['ardate'] < date("Y-m-d") ) {
							echo "<td style='background-color: #f90000;text-align: center; font-weight: 600;border-left: 1px solid #fff;'>ΑΡΓΗΣΕ</td>";
						}elseif ( $row['ardate'] == date("Y-m-d") ){
							echo "<td style='background-color: #4caf50;text-align: center; font-weight: 600;border-left: 1px solid #fff;'>ΣΗΜΕΡΑ</td>";
						}elseif ( $row['ardate'] <= date('Y-m-d', strtotime('+2 days')) ){
							echo "<td style='background-color: #03a9f4;text-align: center; font-weight: 600;border-left: 1px solid #fff;'>ΚΑΘΟΔΟΝ</td>";
						}else{
							echo "<td style='background-color: #ff5722;text-align: center; font-weight: 600;border-left: 1px solid #fff;'>ΕΤΟΙΜΑΖΕΤΑΙ</td>";
						}
					echo "</tr>";
					}
					echo "</table>";

				?>	        
					   <!-- Modal -->
					   <div class="modal fade" id="empModal" role="dialog">
						<div class="modal-dialog">
					 
						 <!-- Modal content-->
						 <div class="modal-content">
						  <div class="modal-header">
							<h4 class="modal-title">Κωδικοί Παραγγελίας</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						  </div>
						  <div class="modal-body">
					 	  </div>
						  <div class="modal-footer">
						   <button type="button" class="btn btn-default" data-dismiss="modal">Κλείσε</button>
						  </div>
						 </div>
						</div>
					   </div>
				</div><!--//container-->
			</div>
    </div><!--//main-wrapper-->
<!--<div id="stopped">Mouse stopped</div>-->
</body>



<?php pg_close($dbconn);?>
</html> 

