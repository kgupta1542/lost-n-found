<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	
	session_start();
	$id = $_SESSION["user_id"];
	
	if(@$_GET['submit']){
		@$category = @$_GET['category_id'];
		
		$sql = "SELECT Activated, first_name FROM mfi where member_id = '$id'";
		$query2 = mysqli_query($dbc,$sql);
?>


<html>
<head>
	<link rel='stylesheet' href='style.css'/>
	<link rel="shortcut icon" href="logo.png"/>
	<link rel='stylesheet' text='text/css' href='main.css'/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
</head>
<body><?php include_once 'header.php'; ?>
	<table cellspacing="30" style="width:100%">
	<tr>
	<?php 	
		if($query2){
			$row = mysqli_fetch_row($query2);
			$active = $row[0];
			$first_name = $row[1];
		
			if($active == 'Y'){
				if($category == "All Items/Uncategorized"){
					$sql = "SELECT * FROM PWFS";
					$query = mysqli_query($dbc,$sql);
			
					if($query){
						$i = 1;
						
						if(mysqli_num_rows($query) <= 0){
							print "No items found. Sorry.";
						}
						
						while($i <= mysqli_num_rows($query)){
							$z = $i % 5;
							if($z == 0){
								?>
								</tr>
								<tr>
								<?php 	
						}
							
							$sql15 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr FROM member_found_items_full_info_5 WHERE PWFS_id = '$i'";
							$query5 = mysqli_query($dbc,$sql15);
						
							$row5 = mysqli_fetch_row($query5);
							$found_category = $row5[0];
							$item = $row5[1];
							$loc = $row5[2];
							$desc = $row5[3];
							$user_name = $row5[4];
							$date = $row5[5];
							$month = $row5[6];
							$year = $row5[7];
							
							$sql15 = "SELECT img_path FROM upload_img WHERE img_id = '$i'";
							$query7 = mysqli_query($dbc,$sql15);
								
							$row5 = mysqli_fetch_row($query7);
							$img_path = $row5[0];
							
							if(strlen($desc) > 68){
								$desc1 = substr($desc,0,68);
								
								$desc1 = $desc1 . " ...more";
							}
							else{
								$desc1 = $desc;	
							}
							?>
							<td style="vertical-align:top;" width="5%">
							<img src="<?php print $row5[0]?>" alt="<?php print $row5[0]?>" height="142">
							<?php 
							if($category!=""){
								echo '<br/>';	
								print "Category: " . $found_category . "<br/> Item Name: " . $item . "<br/> Location Found: " . $loc . "<br/> Description: " . $desc1 . "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "<br/><br/>";
							}
							?>
							</td>
							<?php 
							$i++;
						}
					}
					else{?>
						<h1 align="center"><span style="color:mediumslateblue"><?php print "Your search couldn't be processed.";?></span></h1>
					<?php
					}
				}
				else{
											
					$sql = "SELECT * FROM PWFS";
					$query1 = mysqli_query($dbc,$sql);
			
					if($query1){
						$j = 1;
			
						while($j <= mysqli_num_rows($query1)){
							$y = $j % 5;
							if($y == 0){
								?>
									</tr>
									<tr>
								<?php 	
							}
							
							$sql = "SELECT pwfs_id, found_category, found_item_name, location_found, description, user_name, dt, mnth, yr FROM member_found_items_full_info_5 WHERE found_category = '$category' AND PWFS_id = '$j'";
							$query3 = mysqli_query($dbc,$sql);
								
							$row1 = mysqli_fetch_row($query3);
							$id = $row1[0];
							$found_category = $row1[1];
							$item = $row1[2];
							$loc = $row1[3];
							$desc = $row1[4];
							$user_name = $row1[5];
							$date = $row1[6];
							$month = $row1[7];
							$year = $row1[8];
							
							$sql15 = "SELECT img_path FROM upload_img WHERE img_id = '$j'";
							$query7 = mysqli_query($dbc,$sql15);
							
							$row5 = mysqli_fetch_row($query7);
							$img_path = $row5[0];
							
							if(strlen($desc) > 68){
								$desc1 = substr($desc,0,68);
							
								$desc1 = $desc1 . " ...more";
							}
							else{
								$desc1 = $desc;
							}
							
							if($found_category == $category && $category!=""){
								?>
								<td style="vertical-align:top;" width="5%">
								<img src="<?php print $row5[0]?>" alt="<?php print $row5[0]?>" height="142">
								<?php 
								echo '<br/>';
								print "Category: " . $found_category . "<br/> Item Name: " . $item . "<br/> Location Found: " . $loc . "<br/> Description: " . $desc1 . "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "<br/><br/>";
							}
							?>
							</td>
							<?php 
							$j++;
						}
					}
				}
				?>
				</tr>
				</table>
				<?php 
			}
			else{
				@print "There was an error processing your request. <br/> Please sign in first.";
			}
		}
		else{
			@print "There was an error processing your request. <br/> Please sign in first.";
		}
	}
?>
	</body>
	</html>