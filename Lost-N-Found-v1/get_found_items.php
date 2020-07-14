<?php
$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");

session_start();
@$id = @$_SESSION["user_id"];

if(@$_POST['submit']){
	$category = $_POST['category_id'];
	$itemName = $_POST['item_name'];
	$location = $_POST['loc'];
	$description = $_POST['desc'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$pic = $_POST['file_img'];
	
	$sql72 = "INSERT INTO PWFS VALUES(null, '$id', '$category', '$itemName','$location','$description','$date','$month','$year')";
}
?>
<html>
<head><title>Processing...</title>
	<link rel='stylesheet' href='style.css'/>
	<link rel="shortcut icon" href="logo.png"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
	<link rel='stylesheet' text='text/css' href='main.css'/>
</head>
<body><?php include_once 'header.php'; ?>
    <h1 align="center"><span style="color:mediumslateblue">
    <?php
	//if($active=='Y'){
		$query17 = mysqli_query($dbc,$sql72);
	
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$filepath = "Photo/" . $filename;
		
		move_uploaded_file($filetmp,$filepath);
		
		$sql = "INSERT INTO Upload_Img values(null, '$filename', '$filepath', '$filetype')";
		$query = mysqli_query($dbc,$sql);
	//}
    
    if(@$query17){
		$sql = "SELECT Activated, first_name FROM mfi where member_id = '$id'";
		$query2 = mysqli_query($dbc,$sql);
			
		if($query2){
			$row = mysqli_fetch_row($query2);
			$active = $row[0];
			$first_name = $row[1];
			
			if($active == 'Y'){
				print "There was no problem uploading your found item. <br/> Thanks!";
			}
			else{
				print "1 There was a problem uploading your found item. <br/> Please sign in.";
			}
		}
		else{
			print "2 There was a problem uploading your found item. <br/> Please sign in.";
		}
	}
	else{
		print "3 There was a problem uploading your found item. <br/> Please try again later.";
	}
	?>
</span></h1>
</body>
</html>