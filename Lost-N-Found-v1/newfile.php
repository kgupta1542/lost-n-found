<?php
	$dbc = mysqli_connect("localhost","root","momdad","my_db","3306");
	
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

<?php 
	$sql8 = "SELECT PWFS_id, dt, mnth, yr FROM PWFS";
	$query8 = mysqli_query($dbc,$sql8);
	
	$i = 1;
	
	while($i < mysqli_num_rows($query8)){
		if($query8){
			$row = mysqli_fetch_row($query8);
			$pwfs_id = $row[0];
			$dt = $row[1];
			$mnth = $row[2];
			$yr = $row[3];
			
			$yr1 = date("Y");
			$cur_yr = (int)$yr1;
			$cur_yr1 = $cur_yr + 1;
			
			for($ii = 0; $ii <= $cur_yr; $ii++){
				if($yr == $ii){
					$kk = $cur_yr1 - $ii;
						
					$sorting=array
					(
							array($pwfs_id,$yr,$kk)
					);
				}
			}
			
			print "The id is " . $pwfs_id . ", the year found was " . $yr . ", and the id given is " . $kk;
			
			$sql15 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr FROM member_found_items_full_info_5 WHERE PWFS_id = '$i'";
			$query5 = mysqli_query($dbc,$sql15);
			
			$row5 = mysqli_fetch_row($query5);
			$found_category = $row5[0];
			$item = $row5[1];
			$loc = $row5[2];
			$desc = $row5[3];
			$user_name = $row5[4];
			$date = $row5[5];
			$month = $row5[6];
			$year = $row5[7];
				
			echo '<br/>';
			print "Category: " . $found_category . "<br/> Item Name: " . $item . "<br/> Location Found: " . $loc . "<br/> Description: " . $desc . "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "<br/><br/>";
			
			?>
			<br>
			<br>
			<?php 
		}
		$i++;
	}
?>
</body>
</html>