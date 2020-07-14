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
<h1 align="center"><span style="color:mediumslateblue">Did You Lose Something? </span> <br/> <span style="color:limegreen">Let's Go Ahead and Find It!</span></h1>
	<hr>
<br>
	<form action="http://localhost/Lost-N-Found-v1/getsearchedinfo_pic.php" method="get">
        
<p style="text-align:center;"><select name="category_id"> 
<option value="#" disabled selected> Select a Category </option>
<option value="All Items">All Items</option>
<?php 
	$sql = "SELECT * FROM item_categories";
	$query1 = mysqli_query($dbc,$sql);
		
	if($query1){
		$j = 1;
			
		while($j <= mysqli_num_rows($query1)){
			$sql = "SELECT category_name FROM item_categories WHERE item_id = '$j'";
			$query3 = mysqli_query($dbc,$sql);
	
			$row1 = mysqli_fetch_row($query3);
			$item = $row1[0];
			?>
   					<option value="<?php echo htmlspecialchars($item); ?>"><?php echo $item; ?></option>
			<?php
			$j++;
		}
	}
			?>
</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Go!"></p>
  </form>	
	<br>
<br>
<br>
<br>
	<h4 align="center"><span style="color:red">More Content Will Be Added Shortly</span></h4>
	<p align="center">If you have any suggestions please go to the Contact Us Page or click <a href="http://localhost/Lost-N-Found-v1/contactus.php">here</a></p>
	</body>
</html>


