<!DOCTYPE HTML>
<?php
	include("functions.php");
?>
<html>
	<head>
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'>
		</script>
		<link rel="stylesheet" href="styles.css">
		<style>
			#gmap_canvas img{
				max-width:none!important;
				background:none!important;
			}
		</style>
		
		</div>
		<script type='text/javascript'>
			function init_map(){
				var myOptions = {
				<?php
					if(isset($_GET['lon'])){
						echo "zoom:15,center:new google.maps.LatLng(".$_GET['lat'].",".$_GET['lon'].")";
					}else{
						echo "zoom:10,center:new google.maps.LatLng(7.190708,125.45534099999998)";
					}
				?>,mapTypeId: google.maps.MapTypeId.ROADMAP};
				map = new google.maps.Map(document.getElementById('googleMap'), myOptions);
				marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(
				<?php
				if(isset($_GET['lon'])){
					echo $_GET['lat'].",".$_GET['lon'];
				}else{
					echo "7.190708,125.45534099999998";
				}
					
				?>)});
				infowindow = new google.maps.InfoWindow({content:'<?php
					if(isset($_GET['lon'])){
						echo '<strong>'.$_GET['name'].'</strong><br>Philippines, Davao City<br>';
					}else{
						echo '<strong>UHack</strong><br>Philippines, Davao City<br>';
					}
				?>'});
				google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
				infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
			function addMarker(lat,lon){
				
			}	
		</script>
		<script src="script_functions.js"></script>
	</head>
	
	<body>
		<!--Hidden Element Details-->
		<div id="addForm" style="display:none;">
			<button onclick="changeDisplay('addForm','none');changeDisplay('bg','none')"> X </button>
			
				<h5>Name</h5>
				<h5>Date Reported</h5>
				<h5>Description</h5>
				<p>
					asda
					asdas
					asda
				</p>
				
				<br><br>
				<button type="" name="submit" value="addRequest"> Diagnose </button>
				
		</div>
		<div id="bg" style="display:none;"></div>
		<!--Google Maps-->
		<div id="googleMap" style="width:100%;height:400px;"></div>
		
		<!--News Feed-->
		<br><br>
		<div id="reports">
			
			<table border="" width="100%">
				<?php
					$result = return_values("*","reports","where status='unchecked'",1);
					for($n=0;$n<sizeof($result);$n++){
						$user = return_values("*","users","where id='".$result[$n][3]."'",2);
						$coordinates = explode("@@",$result[$n][2]);
						echo '<tr id="notifOdd">
								<td>
									<h2>'.$user[0][1].'
										<button style="float: right;" type="button" onclick="location.href=\'vetSide.php?lat='.$coordinates[0].'&lon='.$coordinates[1].'&name='.$user[0][1].'\'"> View Location </button>
										<button style="float: right;" onclick="changeDisplay(\'addForm\',\'block\');changeDisplay(\'bg\',\'block\');"> Details </button>
									</h2>
									<h5>March 01, 2019</h5>
									
								</td>
							</tr>';
					}
				?>
			</table>
		</div>
	</body>
</html>