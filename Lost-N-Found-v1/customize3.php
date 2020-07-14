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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
	<link rel='stylesheet' text='text/css' href='main.css'/>
</head>
<body><?php include_once 'header.php'; ?>
	<?php 
	if($member_type == "admin" || $member_type == "superadmin"){
			?>
			<h1 align="center"><span style="color:green">Create A Microsite <br/> Or <br/> Click Proceed To Edit An Existing One!</span></h1>
			<form action="http://localhost/Lost-N-Found-v1/customize3.php" method="post">
        		<p align="center">
        			Site Name:
        			<br>
        			<input type="text" name="siteName">
				<br>
				<br>
        			<input id="button" type="submit" name="submit" value="Create!">
        		</p>
        		</form>
        		<?php 
        		$sql1 = "SELECT * FROM microsites";
	$query1 = mysqli_query($dbc,$sql1);
		
	if($query1){
		$i = 1;
			
		while($i <= mysqli_num_rows($query1)){
			$sql34 = "SELECT site_name, Member_ID FROM microsites WHERE Member_ID = '$id' AND site_id = '$i'";
			$query1 = mysqli_query($dbc,$sql34);
	
			$row1 = mysqli_fetch_row($query1);
			$site = $row1[0];
			$member_id = $row1[1];
			
			if($member_id == $id){
			?>
			<form action="http://localhost/Lost-N-Found-v1/customize2.php" method="POST">
        		<span id="shown">
   					<input type="submit" name="site" value="<?php echo htmlspecialchars($site); ?>">
        		</span>
    		</form>
			<?php
			}
			$i++;
		}
	}
	?>
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
    		
   			@$sql7 = "INSERT INTO microsites VALUES(null, '$id', '$site_name')";
   			@$query = mysqli_query($dbc,$sql7);
   			
   			$sql15 = "SELECT * FROM microsites";
   			$query1 = mysqli_query($dbc,$sql15);
   			
   			if($query1){
   				$j = 1;
   					
   				while($j <= mysqli_num_rows($query1)){
   					$sql4 = "SELECT site_name, Member_ID FROM microsites WHERE Member_ID = '$id' AND site_id = '$j'";
   					$query3 = mysqli_query($dbc,$sql4);
   			
   					$row1 = mysqli_fetch_row($query3);
   					$site = $row1[0];
   					$member_id = $row1[1];
   						
   					if($member_id == $id){
   						?>
   						<form action="http://localhost/Lost-N-Found-v1/customize2.php" method="POST">
   			        		<span id="hidden">
   			   					<input type="submit" name="site" value="<?php echo htmlspecialchars($site); ?>">
   			        		</span>
   			    		</form>
   						<?php
   						}
   						$j++;
   					}
   				}
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