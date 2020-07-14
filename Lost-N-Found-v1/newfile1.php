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
	<link rel='stylesheet' text='text/css' href='main.css'/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<button id="joe">Click me!</button>
<div id="bobby">What is my name?</div>
<div id="bob" class="display">My name is Kanishk</div>

</body>
</html>