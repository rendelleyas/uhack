<!DOCTYPE HTML>
<?php
	include("functions.php");
	if(isset($_GET['id'])){
		
	}else{
		//Return to login
		header('Location:login.php');
	}
	$result = return_values("*","users","where id='".$_GET['id']."'",2);
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="script_functions.js"></script>
	</head>
	
	<body>
		
		<table border="" width="99%">
			<tr>
				<th>My Reports</th>
			</tr>
		</table>
		
	</body>
</html>