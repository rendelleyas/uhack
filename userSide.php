<!DOCTYPE html>
<?php
	include('functions.php');
	if(isset($_POST['submitSymptoms'])){
		$result = add_to('reports','reportDate,location,userId,symptoms,status,notif',"'".getDateNow(19)."','".$_POST['location']."','".$_GET['id']."','".$_POST['symptoms']."','unchecked','none'");
	}
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
    </head>
    <header class="medchick">
	<div class="logo">
	<img src="images/medchick2.png">
	</div>
        <!<h1 class="uk-text-bold">MEDCHICK LOGO</h1> ->
    </header>
    <body>
    <div class="uk-width-1-2@s uk-width-2-5@m">
    <ul class="uk-nav-default uk-nav-parent-icon uk-position-left uk-list-large uk-list-striped uk-width-auto" uk-nav="multiple: true" id="userb">
        <li class="uk-active"><a href="#"><b>My Reports</b></a></li>
        <?php
			$result = return_values('*','reports','where userId="'.$_GET['id'].'"',1);
			for($n=0;$n<sizeof($result);$n++){
				echo '
					<li class="uk-parent">
						<a href="#">'.substr($result[$n][1],0,19).'</a>
						<ul class="uk-nav-sub">
							<h6>Status: '.$result[$n][5].'</h6>';
							if($result[$n][5]=='checked'){
								$vet = return_values('*','users','where id="'.$result[$n][7].'"',2);
								echo '<h6>Diagnosed By: '.$vet[0][1].'</h6>';
							}
							echo'
							<h6>Symptoms Found: </h6>
							<textarea style="width: 100%; padding-top: 5%;padding-left: 5%;" readonly="true">'.$result[$n][4].'</textarea>';
							
							if($result[$n][5]=='checked'){
								echo '<h6>Date Diagnosed: '.substr($result[$n][8],0,19).'</h6>';
								echo '<textarea style="width: 100%; padding-top: 5%;padding-left: 5%;" readonly="true">'.$result[$n][9].'</textarea>';
							}
							echo '
						</ul>
					</li>
				';
			}
		?>
		
    </ul>
</div>

<div class="uk-container uk-position-top-center uk-width-auto" id="addrep">
<button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-example2">Add Report</button>
    <hr>


</div>

    <div class="uk-width-1-2@s uk-width-2-5@m" >
    <ul class="uk-nav uk-nav-default uk-position-top-right uk-list-large uk-list-striped uk-width-auto" id="sideb">
        <li class="uk-active"><a href="#"><b>Notifications</b></a></li>

        <li><a href="#">pilrey diagnosed your report.</a><button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-example">View</button>
        </li>

        <li><a href="#">mas lala lng si dave.</a><button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-example">View</button></li>
    </ul>

    <div id="modal-example" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Farmer's Name</h2>
                <h6>Date of Diagnosis:</h6>
                <textarea class="uk-textarea" name="" id="" cols="30" rows="10" readonly="true">Dri nahitabo ang mga pangyayari</textarea>
                <h6>Diagnosed by:</h6>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Close</button>
                </p>
                </div>
            </div>
    </div>

    <div id="modal-example2" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Please describe the state of your chicken.</h2>
				

							

							
                <?php
					echo '<form method="POST" action="userSide.php?id='.$_GET['id'].'">';
				?>
					<textarea required="true" class="uk-textarea" name="symptoms" id="" cols="30" rows="10"></textarea>
					<p class="uk-text-right">
					
						<p id="demo"><input style="display:none;" id="coordinates" type="text" value=""></p>
						<script>
							var x = document.getElementById("demo");

							function getLocation() {
								if (navigator.geolocation) {
									navigator.geolocation.getCurrentPosition(showPosition);
								} else { 
									x.innerHTML = "Geolocation is not supported by this browser.";
								}
							}

							function showPosition(position) {
								x.innerHTML = '<input style="display:none;"id="coordinates" name="location" type="text" value="'+position.coords.latitude+'@@'+position.coords.longitude+'@@">';
							}
							</script>
						<button class="uk-button uk-button-default uk-modal-close" type="button">Close</button>
						<button class="uk-button uk-button-primary" type="button" onclick="getLocation();" name="submitSymptoms">Get Location</button>
						<button class="uk-button uk-button-primary" type="submit" onclick="" name="submitSymptoms">Submit</button>
				</form>
                </p>
                </div>
            </div>
    </div>
    </body>
</html>    