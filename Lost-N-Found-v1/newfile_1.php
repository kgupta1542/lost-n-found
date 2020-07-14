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
	<script>
function showCustomer() {
	var category=document.getElementById("searchbar").value;
	var item_name=document.getElementById("item_name").value.toLowerCase();
	var xhttp;    
  if (category == "" && item_name == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://localhost/Lost-N-Found-v1/getsearchedinfoajax.php?q="+category+"&n="+item_name, true);
  xhttp.send();
}
</script>
<style>
	#txtHint{
		position:absolute;
		left:150px;
	}
</style>
</head>

<body><?php include_once 'header.php'; ?>
<h1 align="center"><span style="color:mediumslateblue">Did You Lose Something?</span> <br/> <span style="color:limegreen">Let's Go Ahead and Find It!</span></h1>
	<hr>
<select id="searchbar" class="fixed" name="category_id"> 
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
						
			?><option value="<?php echo htmlspecialchars($item); ?>"><?php echo $item; ?></option>
			<?php
						$j++;
					}
				}
			?>
</select>
<br/>
<br/>	
<input id="item_name" type="text" class="fixed" placeholder="Lost Item">
<br/>
<br/>
<button name="refresh" class="fixed" onclick="showCustomer()">Refresh</button>
<div id="txtHint" class="inline-block"></div>
</body>
</html>
