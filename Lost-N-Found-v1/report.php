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
	<h1 align="center"><span style="color:mediumslateblue">Did You Find Something? </span> <br/> <span style="color:limegreen">Let's Return It To The Owner!</span></h1>
	<hr>

<form action="http://localhost/Lost-N-Found-v1/report.php" method="post" enctype="multipart/form-data">      
<p align="center"><input type="file" name="pic_img"></p>

<p align="center"><select name="category_id"> 
<option value="#" disabled selected> Select a Category </option>
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
</select></p>
<p align="center">Item Name:<br/><input type="text" name="item_name"/></p>
<p align="center">Date Found:</p>
<p align="center"><select name="date">
<option selected="selected" value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option> 
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="month">
<option value="January">January</option>
<option value="February">Febraury</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>
<select name="year">
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option selected="selected" value="2018">2018</option>
</select></p>
<p align="center">Location Found:<br/><input type="text" name="loc"/></p>
<p align="center">Description:<br/><textarea rows="7" cols="90" name="desc"></textarea></p>
<p align="center"><input type="submit" name="submit" /></p>
</form>

<?php 
	if(isset($_POST['submit'])){
		$filetmp = $_FILES['pic_img']["tmp_name"];
		$filename = $_FILES['pic_img']["name"];
		$filetype = $_FILES['pic_img']["type"];
		$filepath = "Photo/" . $filename;
		
		if($active=='Y'){
		move_uploaded_file($filetmp,$filepath);
		
		$category = $_POST['category_id'];
		$itemName = $_POST['item_name'];
		$itemName = ucfirst($itemName);
		$location = $_POST['loc'];
		$description = $_POST['desc'];
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		
		$sql8 = "INSERT INTO PWFS values(null, '$id', '$category', '$itemName','$location','$description','$date','$month','$year')";
		$query5 = mysqli_query($dbc,$sql8);
		
		if($query5){
			if($filepath == "Photo/"){
			}
			else{
				$sql = "INSERT INTO Upload_Img values(null, '$filename', '$filepath', '$filetype')";
				$query = mysqli_query($dbc,$sql);
				
				print "There was no problem uploading your found item. <br/> Thanks!";
			}
		}
		else if($query){
			print "Query 5 failed";
		}
		else{
			print "Sorry boii... didnt work out 4 U";
		}
		}
	}
	?>
</body>
</html>