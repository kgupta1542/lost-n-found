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
<body>
<?php include_once 'header.php'; ?>
<h1 align="center"><span style="color:mediumslateblue">Not Part of the Club Yet? </span> <br/> <span style="color:limegreen">Go Agead and Join Today!</span></h1>
	<hr>
		<form action="http://localhost/Lost-N-Found-v1/sendsignupinfo.php" method="post">
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
				First Name:
				<br>
				<input type="text" name="firstName">
				<br>
				<br>
				Last Name:
				<br>
				<input type="text" name="lastName">
				<br>
				<br>
				Email:
				<br>
				<input type="text" name="emailAddress">
				<br>
				<br>
        			<input type="submit" name="submit" value="Sign Up">
        		</p>
    		</form>
	</body>
</html>