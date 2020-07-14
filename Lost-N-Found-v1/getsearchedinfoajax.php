<?php 
$category = $_REQUEST['q'];
$item_name = $_REQUEST['n'];

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

if($active == 'Y'){
	$sql = "SELECT * FROM PWFS";
	$query = mysqli_query($dbc,$sql);
		
	if($query){
		$i = 1;

		while($i <= mysqli_num_rows($query)){
			if($category == "All Items"){
				$sql15 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr, PWFS_id FROM member_found_items_full_info_5 WHERE PWFS_id = '$i'";
				/*if($item_name != ""){
					$sql15 = $sql15 . " AND found_item_name = '$item_name'";
				}*/
				$query5 = mysqli_query($dbc,$sql15);
				$row5 = mysqli_fetch_row($query5);
			}
			else{
				$sql10 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr, PWFS_id FROM member_found_items_full_info_5 WHERE found_category = '$category' AND PWFS_id = '$i'";
				/*if($item_name != ""){
					$sql10 = $sql10 . " AND found_item_name = '$item_name'";
				}*/
				$query3 = mysqli_query($dbc,$sql10);
				$row5 = mysqli_fetch_row($query3);
			}

			$found_category = $row5[0];
			$item = strtolower($row5[1] . " ");
			$loc = $row5[2];
			$desc = $row5[3];
			$user_name = $row5[4];
			$date = $row5[5];
			$month = $row5[6];
			$year = $row5[7];
			$item_id = $row5[8];
				
			$sql15 = "SELECT img_path FROM upload_img WHERE img_id = '$i'";
			$query7 = mysqli_query($dbc,$sql15);

			$row6 = mysqli_fetch_row($query7);
			$img_path = $row6[0];
				
				if($item_name==""){
					$item_name = " ";
				}
							if($category == "All Items" && $category != "" && $found_category != "" && strpos($desc,$item_name) !== false){
				?>
								<div class="td">					
								<img class="item_img inline" src="<?php print $row6[0]?>" alt="<?php print $row6[0]?>" >
								<div class="inline up-ri"><a href="#"><span data-id="<?php print $item_id?>" id="<?php print "flag" . $item_id?>" class="flag">O</span></a>&nbsp;<a href="#"><span data-id="<?php print $item_id?>" id="<?php print "expand" . $item_id?>" class="expand">^</span></a></div>
								<?php
								
								echo '<br/>';
								print "Category: " . $found_category . "<br/> Item Name: " . ucfirst($item) . "<br/> Location Found: " . $loc . "<br/> Description: ";
								
								
								if(strlen($desc) > 70){
									$desc1 = substr($desc,0,70);
									?>
										<span id="<?php print "desc1-" . $item_id?>"><?php print $desc1?></span>
										<span id="<?php print "desc-" . $item_id?>" class="display" ><?php print $desc?></span>
										<span id="<?php print "joe" . $item_id?>" class="joe" href="#" data-text-swap="(less)" data-text-original="...more" data-id="<?php print $item_id?>">...more</span>
									<?php 
								}
								else{
									print $desc;
								}
														
								print "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "</div>";
							}
							else{
								if($category == $found_category && $category!="" && $found_category != ""){
									?>
									<div class="td">					
									<img class="item_img inline" src="<?php print $row6[0]?>" alt="<?php print $row6[0]?>" >
									<div class="inline up-ri"><a href="#"><span data-id="<?php print $item_id?>" id="<?php print "flag" . $item_id?>" class="flag">O</span></a>&nbsp;<a href="#"><span data-id="<?php print $item_id?>" id="<?php print "expand" . $item_id?>" class="expand">^</span></a></div>
									<?php
									
									echo '<br/>';
									print "Category: " . $found_category . "<br/> Item Name: " . $item . "<br/> Location Found: " . $loc . "<br/> Description: ";
												
									if(strlen($desc) > 70){
										$desc1 = substr($desc,0,70);
										?>
											<span id="<?php print "desc1-" . $item_id?>"><?php print $desc1?></span>
											<span id="<?php print "desc-" . $item_id?>" class="display" ><?php print $desc?></span>
											<span id="<?php print "joe" . $item_id?>" class="joe" href="#" data-text-swap="(less)" data-text-original="...more" data-id="<?php print $item_id?>">...more</span>
										<?php 
									}
									else{
										print $desc;
									}
																	
									print "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "</div>";
								}
							}
				
						$i++;
						}
						
					}
					else{?>
						<h1 align="center"><span style="color:mediumslateblue"><?php print "Your search couldn't be processed.";?></span></h1>
					<?php
					}
			}
			else{
				@print "There was an error processing your request. <br/> Please sign in first.";
			}
?>
</tr>
</table>
</body>
</html>