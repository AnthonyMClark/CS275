<?php
	ini_set('display_errors', 1);
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'clarkant-db';
	$dbuser = 'clarkant-db';
	$dbpass = 'PlLhDDtv8g7KlkHW';
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
		or die("Error connecting to database server");
	mysqli_select_db($con, $dbname)
		or die("Error selecting database: $dbname");
	$sql = "SELECT name FROM teams";	
	$result = mysqli_query ($con, $sql);
	//mysqli_close($mysqli);	
?>
<head>
	<title>275 Final</title>
	<meta charset="utf-8"/>
	<link rel ="stylesheet" type = "text/css" href = "Style.css">
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
</head>
<form action="playerInsert.php" method="post" >
	<h2>ADD A PLAYER:</h2>
	First Name: <input type="text" name="firstName" value=""><br>
	Last Name: <input type="text" name="lastName" value=""><br>
	Championships: <input type="text" name="Championships" value=""><br>
	Team Name: 
	<select name="teamName"> 															
	<?php 
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) { 
	?> 

	<option value="<?php echo $line['name'];?>"> <?php echo $line['name'];?> </option>  
	<?php } ?> 	
	<br>
	</select><br><br>
	Team not listed? Go to the <a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/teamPage.php">teams page</a> and add it now!
	<br>
	<input type="submit">
</form>