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
	<h1 align="center"><span style="color:mediumslateblue">Did You Need To Change Something? </span> <br/> <span style="color:limegreen">You Can Fix It Right Away!</span></h1>
	<hr>
	<?php 
	if($id > 0){
	$sql = "SELECT first_name, last_name, user_name, email, activated FROM mfi WHERE member_id = '$id'";
	$query = mysqli_query($dbc, $sql);
	
	$row1 = mysqli_fetch_row($query);
	$dbFirstName = $row1[0];
	$dbLastName = $row1[1];
	$dbUserName = $row1[2];
	$dbEmail = $row1[3];
	$active = $row1[4];
	
		if($active=='Y'){
	?>
	<h4 id="jacob">Name:</h4><?php print " " . $dbFirstName . " " . $dbLastName ?> <br/><br/> <h4 id="jacob">Username:</h4> <?php print " ". $dbUserName?> <br/><br/> <h4 id="jacob">Email Address:</h4><?php print " " . $dbEmail; 
		}
		else{
			print "Please sign in...";	
		}
	}
	else{
		print "Please sign in...";
	}
	?>
</body>
</html>