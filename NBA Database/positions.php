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
	$sql = "SELECT lastname, firstname FROM players ORDER BY lastname";	
	$result = mysqli_query ($con, $sql);
	//mysqli_close($mysqli);	
?>
<form action="positionInsert.php" method="post" >
	Player:
	<select name="lastName"> 															
	<?php 
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) { 
	?> 
	<option value="<?php echo $line['lastname'];?>"> <?php echo $line['lastname']  . ", " . $line['firstname'];?> </option>  
	<?php } ?> 	
	<br>
	</select><br>

	Position: 
	<select name="position">
		<option name="position" value="Point Guard">Point Guard </option>
		<option name="position" value="Shooting Guard">Shooting Guard </option>
		<option name="position" value="Small Forward">Small Forward </option>
		<option name="position" value="Power Forward">Power Forward </option>
		<option name="position" value="Center">Center </option>
    </select>
	<br>
	Player not listed? Go to the <a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/playerPage.php">player page</a> and add them now!
	<br>
<input type="submit">
</form>