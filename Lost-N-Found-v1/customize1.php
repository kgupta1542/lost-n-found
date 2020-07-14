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
	<h1 align="center"><span style="color:green">Choose Which Site You Want To Edit Here!</span></h1>
	<?php 
	$sql = "SELECT * FROM microsites";
	$query1 = mysqli_query($dbc,$sql);
		
	if($query1){
		$j = 1;
			
		while($j <= mysqli_num_rows($query1)){
			$sql = "SELECT site_name, Member_ID FROM microsites WHERE Member_ID = '$id' AND site_id = '$j'";
			$query3 = mysqli_query($dbc,$sql);
	
			$row1 = mysqli_fetch_row($query3);
			$site = $row1[0];
			$member_id = $row1[1];
			
			if($member_id == $id){
			?>
			<form action="http://localhost/Lost-N-Found-v1/customize2.php" method="POST">
        		<p>
   					<input type="submit" name="site" value="<?php echo htmlspecialchars($site); ?>">
        		</p>
    		</form>
			<?php
			}
			$j++;
		}
	}
	
	?>
</body>
</html>