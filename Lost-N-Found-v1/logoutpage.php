<html>
<head>
<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<?php
	$dbc = mysqli_connect("localhost", "root", "newdunia7", "my_db", "3303");

	session_start();
	$id = $_SESSION['user_id'];

	$sql = "UPDATE MFI SET Activated = 'N' WHERE member_id = '$id'";
	$query = mysqli_query($dbc,$sql);
		
	if($query){
		print "It worked! You are logged out!";
	}
	else{
		print "There was a problem...";
	}

?>		
<script type="text/javascript">	
	setTimeout(function(){ window.location.replace("http://localhost/Lost-N-Found-v1/signin.php"); }, 1500);
</script>
			
</body>
</html>