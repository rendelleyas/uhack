<!DOCTYPE html>
<?php
	include("functions.php");
?>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <link rel="stylesheet" href="style.css">
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
    <header class="medchick">
        <h1>MEDCHICK LOGO</h1>
    </header>
    

    <body>
	<div id="googleMap" style="width:700px;height:400px;"></div>
	
	
    <div="uk-container uk-container-expand" id="gmaps">
            
        
            <div class="uk-width-1-2@s uk-width-2-5@m" >
            <ul class="uk-nav uk-nav-default uk-position-top-right uk-list-large uk-list-striped uk-width-1-3" id="sideb">
                <li class="uk-active"><a href="#"><b>Notifications</b></a></li>
				<?php
					$result = return_values("*","reports","where status='unchecked'",1);
					for($n=0;$n<sizeof($result);$n++){
						$user = return_values("*","users","where id='".$result[$n][3]."'",2);
						$coordinates = explode("@@",$result[$n][2]);
						echo '
							<li><a href="#">'.$user[0][1].'</a>
							
							<button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-example"
							onclick="
								changeHTML(\'fullName\',\''.$user[0][1].'\');
								changeHTML(\'reportDate\',\''.substr($result[$n][1],0,19).'\');
								changeHTML(\'symptoms\',\''.$result[$n][4].'\');
									">Details</button>
                
							<button class="uk-button uk-button-primary" type="button" onclick="location.href=\'vetSide.php?vId='.$_GET['vId'].'&lat='.$coordinates[0].'&lon='.$coordinates[1].'&name='.$user[0][1].'\'">View Location</button></li>
						';
					}
				?>
                

                <li><a href="#">mas lala lng si dave.</a><button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-example">Details</button><button class="uk-button uk-button-primary" type="button">View Location</button></li>
            </ul>

            <div id="modal-example" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                <h2 id="fullName" class="uk-modal-title">Farmer's Name</h2>
                <h6 id="reportDate">Date:</h6>
                <textarea class="uk-textarea" name="" id="symptoms" cols="30" rows="10" readonly="true">Dri nahitabo ang mga pangyayari</textarea>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Close</button>
                </p>
                </div>
            </div>
        </div>
    </div>    
    </body>
</html>