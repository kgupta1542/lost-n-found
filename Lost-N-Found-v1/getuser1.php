<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<?php
echo "<table>
<tr>
<th>Category Name</th>
<th>Item Name</th>
<th>Location</th>
<th>Description</th>
<th>Username</th>
<th>Date</th>
<th>Month</th>
<th>Year</th>
</tr>";

$q = intval($_GET['q']);

$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
if (!$dbc) {
    die('Could not connect: ' . mysqli_error($dbc));
}

mysqli_select_db($dbc,"my_db");

$sql = "SELECT * FROM PWFS";
$query1 = mysqli_query($dbc,$sql);
	
if($query1){
	$j = 1;
		
	while($j <= mysqli_num_rows($query1)){
		$sql15 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr FROM member_found_items_full_info_5 WHERE found_category = '$q' AND PWFS_id = '$j'";
		$query3 = mysqli_query($dbc,$sql15);

		$row1 = mysqli_fetch_row($query3);
		$found_category = $row1[0];
		$item = $row1[1];
		$loc = $row1[2];
		$desc = $row1[3];
		$user_name = $row1[4];
		$date = $row1[5];
		$month = $row1[6];
		$year = $row1[7];
			
		if($found_category == $q){
			echo '<br/>';
			print "Category: " . $found_category . "<br/> Item Name: " . $item . "<br/> Location Found: " . $loc . "<br/> Description: " . $desc . "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "<br/><br/>";
		}
			
		$j++;
	}
}
/*
$row = mysqli_fetch_row($result);
$member_id = $row[0];
$user_name = $row[1];
$pass_word = $row[2];
$first_name = $row[3];
$last_name = $row[4];

echo "The member id is " . $member_id . ". The username is " . $user_name . ". The password is " . $pass_word . ". The name of the user is " . $first_name . " " . $last_name . ".";
*/

echo "</table>";
mysqli_close($dbc);
?>
</body>
</html>