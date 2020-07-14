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
$q = intval($_GET['q']);

$con = mysqli_connect("localhost","root","newdunia7","my_db","3303");

mysqli_select_db($con,"my_db");
$sql="SELECT * FROM mfi WHERE member_id = '$q'";
$result = mysqli_query($con,$sql);

echo "<table>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
    echo "<td>" . $row[7] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>