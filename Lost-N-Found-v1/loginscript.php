<?php
$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");

	if(@$_POST['submit']){
		$username = strtolower($_POST['userName']);
		$password = $_POST['passWord'];
		
		$sql8 = "SELECT member_id, user_name, pass_word, member_type FROM MFI WHERE user_name = '$username'";
		$query7 = mysqli_query($dbc,$sql8);
	}
	session_start();
	@$id = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="logo.png"/>
	<link rel='stylesheet' type='text/css' href='main.css'/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<br>
	<h1 align="center"><span style="color:mediumslateblue">
			<?php
			if($query7){
				$row = mysqli_fetch_row($query7);
				$user_id = $row[0];
				$dbUsername = $row[1];
				$dbPassword = $row[2];
				$user_type = $row[3];
			
				$_SESSION["user_id"] = $user_id;
				$_SESSION["user_type"] = $user_type;
				
				if($password == $dbPassword && $username == $dbUsername && $username != ""){
					$sql9 = "update MFI set activated = 'Y' where member_id = '$user_id'";
					$query1 = mysqli_query($dbc,$sql9);?>
					You Are Logged In
				<?php 
					if($user_type == "superadmin"){?>
						As The Superadmin!
						<br/>
						Please start customizing your <a href="http://localhost/Lost-N-Found-v1/customize.php">microsite</a>!
					<?php }
					elseif($user_type == "admin"){?>
						As An Admin!
						<br/>
						Please start customizing your <a href="http://localhost/Lost-N-Found-v1/customize.php">microsite</a>!
					<?php }
					else{?>
						As A User!
					<?php }	
				}
				else{?>
					Please Log In Again!
				<?php }
			}
			else{ ?>
				Please Log In Again!
			<?php } ?>
				<br/></span></h1>		
</body>
</html>