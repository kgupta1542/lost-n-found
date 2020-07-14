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
<body><?php include_once 'header.php'; ?>
	<h1 align="center"><span style="color:mediumslateblue"><strong>Did You Want To Contact LAF?</span> <br/><span style="color:limegreen">Here Is The Information You Need!</strong></span></h1>
	<hr>
	<h3 align="center">Since this is the beta version of Lost-N-Found any suggestions on how to improve the site would be greatly appreciated. Thank you!</h3>
	<img style="margin-left:500px" src="https://www.google.com/maps/vt/data=RfCSdfNZ0LFPrHSm0ublXdzhdrDFhtmHhN1u-gM,lJP0YHWFwYatF2VOi9x_kUq7amS42WIRZ68itfUlW5DXrDUSaaLuMWQfEiryLeMRbdwnG18RvYpW0Zn6S_RnaVrgGwvkgPH6psO7YfwFFAeFmd2X95LjT-V3oISihrGM5OrwVWvN2HHM9YPl9DHKj94CaAtNXMQyM46kw4CJmKX8xVSw4w">	
	<h4 align="center">Email: kanhagupta@yahoo.com <br/><br/> Phone <span>(text-only)</span>: 760-799-9401</h4>
	
</body>
</html>