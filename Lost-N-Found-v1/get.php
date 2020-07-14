<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303"); 
	
	session_start();
	$id = $_SESSION['user_id'];
	
	print $id;
	
	$sql = "SELECT first_name FROM mfi WHERE member_id = '$id'";
	$query = mysqli_query($dbc,$sql);
	
	$row1 = mysqli_fetch_row($query);
	$firstName = $row1[0];
	
	print " " . $firstName;
	
	if(@$_POST['submit']){
	@$category = @$_POST['category'];
	
	@$sql = "SELECT found_item_name FROM member_found_items_full_info_5 where found_category = '$category'";
	@$query1 = @mysqli_query($dbc,$sql);
	
	@$row = @mysqli_fetch_row($query1); 
	@$name = $row[0];
	
	@print $name;
	}
?>

<html>
<head><title>Get - Test</title>
<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<form action="http://localhost/Lost-N-Found-v1/get.php" method="post">
        		<p align="center">
        			Category
        			<br>
        			<input type="text" name="category">
				<br>
				<br>
        			<input type="submit" name="submit" value="Get!">
        		</p>
    		</form>
</body>
</html>