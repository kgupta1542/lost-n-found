<?php
	$dbc = mysqli_connect("localhost","root","newdunia7","my_db","3303");
	
	$hi = "hi";
	session_start();
	@$id = @$_SESSION["user_id"];  
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
    <table>
        <tbody><tr>
            <td>
                <img src="https://unsplash.imgix.net/photo-1428856472086-8674d9cbd6bc?fit=crop&amp;fm=jpg&amp;h=800&amp;q=75&amp;w=1050" width="425px">
            </td>
            
            <td>
    	
    <h2 align="center"><u><font size="6em" color="mediumslateblue"><strong>About Us</strong></font></u></h2>       
            
    <p><font size="4em">Lost-N-Found is made by Kanishk Gupta. Kanishk Gupta is a middle schooler in 8th grade. He lives in Palm Desert, California. Kanishk is able to program in many languages: <font size="6em"><span style="color:red"><strong>HTML</strong></span>, <span style="color:purple"><strong>CSS</strong></span>, <span style="color:green"><strong>Javascript</strong></span>, <span style="color:indigo"><strong>JQuery</strong></span>, <span style="color:orange"><strong>SQL</strong></span>, <span style="color:violet"><strong>Python</strong></span>, <span style="color:yellow"><strong>Ruby</strong></span>, <span style="color:pink"><strong>RobotC</strong></span>, <span style="color:indigo"><strong>PHP</strong></span>, and <span style="color:red"><strong>MORE!</strong></span></font></font></p>
            </h2></td>
            
            <td>
                <img src="https://ununsplash.imgix.net/photo-1421284621639-884f4129b61d?fit=crop&amp;fm=jpg&amp;h=700&amp;q=75&amp;w=1050" width="425px">
            </td>
        </tr>
    </tbody></table>

    <table>
        <tbody><tr>
            <td>
                <img src="https://ununsplash.imgix.net/photo-1433838552652-f9a46b332c40?fit=crop&amp;fm=jpg&amp;h=700&amp;q=75&amp;w=1050" width="425px">
            </td>
            
            <td>
    <h2 align="center"><u><font size="6em" color="mediumslateblue"><strong>Our Goal</strong></font></u></h2>
            
    <p><font size="4em">Lost-N-Found is a Lost and Found website that allows users like you to find lost items <font size="6em"><span style="color:purple"><strong>quickly</strong></span></font>. Our sole goal is to make sure that you don't <font size="6em"><span style="color:green"><strong>waste</strong></span></font> any <font size="6em"><span style="color:indigo"><strong>time</strong></span></font> searching for your lost items. </font></p>
            </td>
            
            <td>
                <img src="https://ununsplash.imgix.net/photo-1429308755210-25a272addeb3?fit=crop&amp;fm=jpg&amp;h=725&amp;q=75&amp;w=1050" width="425px">
            </td>
        </tr>
    </tbody></table>
</body>
</html>