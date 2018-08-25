<!DOCTYPE html>
<?php
	include("functions.php");
	if(isset($_POST['createAcc'])){
		$existing = return_values('*','users','where userName="'.$_POST['uName'].'"',2);
		if(!$existing){
			if($_POST['uType']!="-1"){
				$result = add_to('users','name,userName,password,userType'," '".$_POST['fullName']."','".$_POST['uName']."','".$_POST['uPass']."','".$_POST['uType']."' ");
				if($result){
					echo '<a style="width: 100%; background-color:green;color: white;" class="uk-button uk-button-default">Registration Successful</a>';
				}else{
					echo '<a style="width: 100%; background-color:red;color: white;" class="uk-button uk-button-default">Registration Failed</a>';
				}
			}else{
				echo '<a style="width: 100%; background-color:red;color: white;" class="uk-button uk-button-default">Please Choose a User Type</a>';
			}
		}else{
			echo '<a style="width: 100%; background-color:red;color: white;" class="uk-button uk-button-default">User Name Already Exists</a>';
		}
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
    <body>
    <div class="bg">
    <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
   
    <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-position-center uk-width-2-3 uk-height-medium" id="orange">
            <h3 class="uk-card-title uk-text-bold" id="orange">MedChick</h3>
            <p>An early warning system for Bird Avian Influenza <br>Outbreak based on pattern of disease occurence.</p>

            <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-position-right uk-width-1-2 uk-height-medium" id="white">
                <div class="uk-vertical-align uk-text-center uk-height-1-1" id="white">
				
                <h3 class="uk-card-title uk-text-bold" id="login">Login</h3>
					
                    <form method="POST" action="">
						<?php
							if(isset($_POST['login'])){
								$result = return_values('*','users','where userName="'.$_POST['loginName'].'" && password="'.$_POST['loginPassword'].'"',2);
								if(!$result){
									echo '<a style="font-size: 10px;width: 100%; background-color:red;color: white;" class="">Incorrect User Name or Password</a>';
								}else{
									if($result[0][4]=="0"){
										header('Location:vetSide.php?vId='.$result[0][0]);
									}else{
										header('Location:userSide.php?id='.$result[0][0]);
									}
								}
							}
						?>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input name="loginName" class="uk-input" type="text">
                            </div>
                        </div>

                         <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input name="loginPassword" class="uk-input" type="password">
                            </div>
                        </div>
						<button class="uk-button uk-button-default" type="submit" name="login">Log In</button>
						<a class="uk-button uk-button-default" href="#modal-sections" uk-toggle>Register</a>
                    </form>

                    
                    

<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Register</h2>
        </div>
        <div class="uk-modal-body">
        
           
<form method="POST" action="">

        <div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text">User Type &nbsp</label>
        <div class="uk-inline">
         <div class="uk-margin">
        <div class="uk-form-controls">
            <select name="uType" class="uk-select" id="form-horizontal-select">
            <option value="-1">Choose</option>
                <option value="0">Veterinarian</option>
                <option value="1">Farmer</option>
            </select>
        </div>
    </div>

        </div>

        
    </div>

    <div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text">Full Name &nbsp</label>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input required="true" name="fullName" class="uk-input" type="text" placeholder="First-Middle-Last">
        </div>
    </div>

    <div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text">Username &nbsp</label>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input required="true" name="uName" class="uk-input" type="text">
        </div>
    </div>

    <div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text">Password &nbsp</label>
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon" uk-icon="icon: lock"></span>
            <input required="true" name="uPass" class="uk-input" type="password">
        </div>
    </div>

	<div class="uk-modal-footer uk-text-right">
		<button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
		<button class="uk-button uk-button-primary" type="submit" name="createAcc">Create Account</button>
	</div>
</form>


        </div>
        
    </div>
</div>
    
                   
    
            </div>
        </div>

            </div>
        </div>
    </div>
</div>


    </div>
    
    
    </body>
</html>