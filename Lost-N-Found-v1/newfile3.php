<html>
<head>
<link rel='stylesheet' text='text/css' href='main.css'/>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<?php include_once 'header.php'; ?>
<form action="http://localhost/Lost-N-Found-v1/newfile3.php" method="get">
<p align="center"><select name="category_id" onchange="showUser(this.value)">
<?php 
$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
$sql = "SELECT * FROM mfi";
$query1 = mysqli_query($dbc,$sql);

if($query1){
	$j = 1;

		while($j <= mysqli_num_rows($query1)){
			$sql = "SELECT first_name, last_name FROM mfi WHERE member_id = '$j'";
			$query3 = mysqli_query($dbc,$sql);
	
			$row1 = mysqli_fetch_row($query3);
			$fname = $row1[0];
			$lname = $row1[1];
			?>
   					<option value="<?php echo htmlspecialchars($j); ?>"><?php echo $fname . " " . $lname; ?></option>
			<?php
			$j++;
		}
}
		?>
		</select></p>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>