<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	
	session_start();
	$id = $_SESSION['user_id'];
	$member_type = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='style.css'/>
	<link rel="shortcut icon" href="logo.png"/>
	<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body><?php include_once 'header.php'; ?>
	<?php 
	if($member_type == "admin" || $member_type == "superadmin"){
			?>
			<h1 align="center"><span style="color:green">Create A Microsite <br/> Or <br/> Click Proceed To Edit An Existing One!</span></h1>
			<form action="http://localhost/Lost-N-Found-v1/customize.php" method="post">
        		<p align="center">
        			Site Name:
        			<br>
        			<input type="text" name="siteName">
				<br>
				<br>
        			<input type="submit" name="submit" value="Create!">
        		</p>
        		</form>
        		<br/>
        		<br/>
        		<form action="http://localhost/Lost-N-Found-v1/customize1.php" method="post">
        		<p align="center">
   					<input type="submit" name="proceed" value="Proceed!">
        	</p>
    		</form>
    		<?php 
    	if(@$_POST['submit']){
    		@$site_name = $_POST['siteName'];
    		
   			@$sql = "INSERT INTO microsites VALUES(null, '$id', '$site_name')";
   			@$query = mysqli_query($dbc,$sql);
   			?>
   			<h1 align="center"><span style="color:green">Your Site Has Been Created <br/> Click The Button To Proceed</span></h1>
		<?php 
		}
	}
	else{?>
		<h1 align="center"><span style="color:green">You Are Not Allowed On This Part Of The Site. <br/> Please Redirect Yourself.</span></h1>
	<?php 
	}
	?>
</body>
</html>