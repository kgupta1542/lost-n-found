<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="http://localhost/Lost-N-Found-v1/logo.png"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel='stylesheet' text='text/css' href='main.css'/>
	
</head>
<body><header id="jeff">
			<div class=""><a class="menu" href="#"><span class="menu absolute"><img id="menu" src="menu.png"></span></a></div>
       		<div id="john" class="absolute"><img id="john1" src="logo1.png"></div>
        	 <?php
            	$sql = "SELECT Activated, first_name FROM mfi where member_id = '$id'";
            	$query = mysqli_query($dbc,$sql);
            
            	if($query){
            		$row = mysqli_fetch_row($query);
            		$active = $row[0];
            		$first_name = $row[1];
            		
            		if($active == 'Y'){?>
            			<span id="account" class="inline-block"><font color="black"> <?php @print "Welcome " . $first_name . " <a href='#'><div class='dropdown inline arrow-down' id='dropdown'></div></a>"; ?> </font></span>
            		<?php 
            		}
            	}
            ?>
    </header>
    <span class="menu"><table class="inline" id="geoffrey">
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/home.php" id="johnny">Home</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/signin.php" id="johnny">Sign In</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/signup.php" id="johnny">Sign Up</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/search.php" id="johnny">Search</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/report.php" id="johnny">Report</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/contactus.php" id="johnny">Contact Us</a></td>
</tr>
</table>
</span>

<table id="personal" class="display">
<td><a href="http://localhost/Lost-N-Found-v1/profile.php" id="johnny">Profile</a></td>
</tr>
<tr>
<td><a href="http://localhost/Lost-N-Found-v1/logoutpage.php" id="johnny">Log Out</a></td>
</tr>
</table>
	<hr>
</body>
</html>