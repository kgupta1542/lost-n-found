<?php
$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");

session_start();
$id = $_SESSION["user_id"];

if(@$_GET['submit']){
	@$category = @$_GET['category_id'];
	?>


<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel='stylesheet' href='style.css'/>
	<link rel="shortcut icon" href="logo.png"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
<link rel='stylesheet' text='text/css' href='main.css'/>
	<script>
	$(document).ready(function(){
	    $("#john").mouseenter(function(){
	        $("#geoffrey").css("margin-left", "0px");
	    });
	    $("#geoffrey").mouseenter(function(){
	        $("#geoffrey").css("margin-left", "0px");
	    });
	    $("#geoffrey").mouseleave(function(){
	        $("#geoffrey").css("margin-left", "-225px");
	    });
	    $(".joe").click(function(){
	    	var id = $(this).data("id");
	    	$(this).siblings("#desc-" + id).toggleClass("display");
	    	$(this).siblings("#desc1-" + id).toggleClass("display");
		    
	    	  $("#joe" + id).text() == $("#joe" + id).data("text-swap") 
	    	    ? $("#joe" + id).text($("#joe" + id).data("text-original")) 
	    	    : $("#joe" + id).text($("#joe" + id).data("text-swap"));
			});
	});

	function myFunction(){
		$('#bobby').replaceWith('#bob');
	}
	</script>
	<script type="text/javascript">
	function setCookie(cname,cvalue){
	    document.cookie = cname + "=" + cvalue + ';expires= ;';
	}

	var screen_res = screen.width;

	setCookie("screen_res",screen_res);
	</script>
</head>
<body><?php include_once 'header.php'; ?>
	<table id="table">
	<tr>
	<?php 	
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
							$sql15 = "SELECT found_category, found_item_name, location_found, description, user_name, dt, mnth, yr, PWFS_id FROM member_found_items_full_info_5 WHERE PWFS_id = '$i'";
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
							$item_id = $row5[8];
							
							$sql15 = "SELECT img_path FROM upload_img WHERE img_id = '$i'";
							$query7 = mysqli_query($dbc,$sql15);
								
							$row5 = mysqli_fetch_row($query7);
							$img_path = $row5[0];
							
							?>
							<td class="td" width="<?php $screen_res = $_COOKIE["screen_res"];$width = $screen_res/3; $width = $width - 50; $width = $width . "px"; print $width;  ?>">					
							<img src="<?php print $row5[0]?>" alt="<?php print $row5[0]?>" height="142">
							<?php 
							if($category!="")
								echo '<br/>';
								print $item; 
							
							if($i%3 == 0){
								?>
								</tr>
								<tr>
								<?php 
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
					$sql = "SELECT * FROM PWFS";
					$query1 = mysqli_query($dbc,$sql);
			
					if($query1){
						$j = 1;
			
						while($j <= mysqli_num_rows($query1)){
							$sql = "SELECT pwfs_id, found_category, found_item_name, location_found, description, user_name, dt, mnth, yr FROM member_found_items_full_info_5 WHERE found_category = '$category' AND PWFS_id = '$j'";
							$query3 = mysqli_query($dbc,$sql);
								
							$row1 = mysqli_fetch_row($query3);
							$item_id = $row1[0];
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
		
							if($found_category == $category && $category!=""){
								?>
								<td class="td" width="<?php $screen_res = $_COOKIE["screen_res"];$width = $screen_res/3; $width = $width - 50;$width = $width . "px"; print $width;  ?>">
								<img src="<?php print $row5[0]?>" alt="<?php print $row5[0]?>" height="142">
								<?php 
							if($category!="")
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
								
								print "<br/> Found By: " . $user_name . " on " . $month . " " . $date . " " . $year . "<br/><br/></td>";
							}
						
							if($j%3 == 0){
								?>
								</tr>
								<tr>
								<?php 
							}
							$j++;
						}
					}
				}
			}
			else{
				@print "There was an error processing your request. <br/> Please sign in first.";
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