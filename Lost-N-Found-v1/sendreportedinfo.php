<?php 
$category = $_REQUEST['cat'];
$item_name = $_REQUEST['name'];
$item_name = ucfirst($item_name);
$date = $_REQUEST['date'];
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
$loc = $_REQUEST['loc'];
$desc = $_REQUEST['desc'];
$filetmp = $_REQUEST['filetmp'];
$filename  = $_REQUEST['filename'];
$filetype = $_REQUEST['filetype'];
$filepath = $_REQUEST['filepath'];

$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");

session_start();
@$id = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php
	$sql = "SELECT Activated, first_name FROM mfi where member_id = '$id'";
	$query = mysqli_query($dbc,$sql);

	if($query){
		$row = mysqli_fetch_row($query);
		$active = $row[0];
		$first_name = $row[1];	
	}
	
	if($active == "Y"){
		echo $month . "<br/>" . $filename . "<br/>" . $filetmp . "<br/>" . $filetype;
		
		/*move_uploaded_file($filetmp,$filepath);
		
		$sql8 = "INSERT INTO PWFS values(null, '$id', '$category', '$item_name','$loc','$desc','$date','$month','$year')";
		$query5 = mysqli_query($dbc,$sql8);
		
		if($query5){
			if($filepath !== "Photo/"){
				$sql2 = "INSERT INTO Upload_Img values(null, '$filename', '$filepath', '$filetype')";
				$query2 = mysqli_query($dbc,$sql2);
				
				print "There was no problem uploading your found item. <br/> Thanks!";
			}
		}
		else if($query5){
			print "Query 5 failed";
		}
		else{
			print "Sorry boii... didnt work out 4 U";
		}*/
	}
	?>
</tr>
</table>
</body>
</html>