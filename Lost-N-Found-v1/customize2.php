<?php 
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");

	$site = $_POST['site'];
	
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
	<h1 align="center"><span class="input" style="color:green"><?php print $site?></span></h1>
	<h3 align="center"><span style="color:green">Search/Report Categories</span></h3>
	<form action="http://localhost/Lost-N-Found-v1/customize3.php" method="post">
		<p align="center">
			<input type="checkbox"  name="category1" value="Y">Accesories<br/>
			<input type="checkbox" name="category2" value="Y">Aparrel<br/>
			<input type="checkbox" name="category3" value="Y">Technology<br/>
			<input type="checkbox" name="category4" value="Y">Water Bottles<br/>
			<input type="checkbox" name="category5" value="Y">All Items/Uncategorized<br/>
			<input type="submit" id="go" name="submit" value="Submit!">
		</p>
	</form>
	</body>
</html>