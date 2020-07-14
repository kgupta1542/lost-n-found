<?php
$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	if($_POST['submit']){
		$username = strtolower($_POST['userName']);
		$password = $_POST['passWord'];
		$firstname = $_POST['firstName'];
		$lastname = $_POST['lastName'];
		$email = $_POST['emailAddress'];
	}
	else{
	}	
	
	session_start();
	@$id = @$_SESSION["user_id"];
?>
<html>
<head>
<title>Processing...</title>
<link rel='stylesheet' text='text/css' href='main.css'/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
	<?php 
	if($active !== 'Y'){
		$sql = "insert into MFI values(null,'$username', '$password', '$firstname','$lastname','$email', 'N', 'user')";
		$query6 = mysqli_query($dbc,$sql);
	}
	if($query6){
	?><h1 align="center"><span style="color:mediumslateblue">You Are Signed Up! <br/> Please Redirect Yourself To The <a href="http://localhost/Lost-N-Found-v1/SignIn.php">Sign In</a> Page To Log In</span></h1><?php
		$sql7 = "SELECT member_id FROM mfi WHERE user_name = '$username'";
		$query10 = mysqli_query($dbc,$sql7);
		
		if($query10){
			$row1 = mysqli_fetch_row($query10);
			$user_id = $row1[0];
			
			$_SESSION["user_id"] = $user_id;
			
			$sql15 = "update MFI set activated = 'Y' where member_id = '$user_id';";
			$query55 = mysqli_query($dbc,$sql15);
		}
	}
		else{
			print "There was some issue processing your request please try again later.";
		}
	?>
</body>
</html>