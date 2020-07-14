<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	
	session_start();
	$id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' text='text/css' href='main.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php include_once 'header.php'; ?>
<h1 align="center"><span style="color:mediumslateblue">Did You Lose Something?</span> <br/> <span style="color:limegreen"> Go Ahead And Find It!</span></h1>
<hr>
<table>
<tr>
<td>
<form class="form" action="http://localhost/Lost-N-Found-v1/getsearchedinfo.php" method="post">
<br/>
Category:
<br/>
<select class="cat_id" name="category_id">
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
<br/>
<br/>
Keyword:
<br/>
<input type="text" name="keyword">
<br/>
<br/>
City:
<br/>
<input type="text" name="city">
<br/>
<br/>
Date Lost:
<br/>
<input type="text" name="date" id="datepicker" placeholder="mm/dd/yy">
<br/>
<br/>
<p align="center">
<input type="submit" class="submit" name="submit" value="Go!">
</p>
</form>

<button class="name-submit" value="Go!!!!!">Go!!!!!</button>
</td>
</tr>
</table>
</body>
</html>