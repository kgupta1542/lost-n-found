<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	session_start();
	@$id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='style.css'/>
	<link rel="shortcut icon" href="logo.png"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel='stylesheet' text='text/css' href='main.css'/>
	<script type='text/javascript' src='script.js'></script>
</head>
<body><?php include_once 'header.php'; ?>
<h1 align="center"><span style="color:mediumslateblue">Already Part of The Club? </span> <br/> <span style="color:limegreen">Go Ahead and Sign In!</span></h1>
	<hr>
		<form action="http://localhost/Lost-N-Found-v1/loginscript.php" method="post">
        		<p align="center">
        			Username:
        			<br>
        			<input type="text" name="userName">
        			<br>
        			<br>
        			Password:
        			<br>
        			<input type="password" name="passWord">
					<br>
					<br>
        			<input type="submit" name="submit" value="Sign In">
        		</p>
    		</form>
	</body>
</html>