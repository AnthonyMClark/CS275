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
	$sql = "SELECT name FROM teams ORDER BY name";	
	$result = mysqli_query ($con, $sql);
	$sql2 = "SELECT name FROM teams ORDER BY name";	
	$result2 = mysqli_query ($con, $sql2);
	//mysqli_close($mysqli);	
?>
<form action="gameInsert.php" method="post" >
	ADD A GAME:<br>
	Select Teams: &nbsp;&nbsp;&nbsp;&nbsp;Enter Score:<br>
	<select name="team1"> 					 										
	<?php 
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) { 
	?> 
	<option value="<?php echo $line['name'];?>"> <?php echo $line['name'];?> </option>  
	<?php } ?> 	
	<br>
	</select>   &nbsp;<input type="text" name="team1Score" value=""><br><br>
	
	<select name="team2"> 															
	<?php 
	while ($line2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) { 
	?> 
	<option value="<?php echo $line2['name'];?>"> <?php echo $line2['name'];?> </option>  
	<?php } ?> 	
	<br>
	</select>    &nbsp;<input type="text" name="team2Score" value=""><br><br>
	Date: <input type="date" name="gameDate" value=""><p>
	<input type="submit"><br>
	Team not listed? Go to the <a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/teamPage.php">teams page</a> and add it now!
	
</form>