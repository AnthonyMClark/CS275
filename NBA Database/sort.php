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
?>
<form action="printTest.php" method="post" >
	Select Teams:<br>
	<select name="teamName"> 					 										
	<?php 
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) { 
	?> 
	<option value="<?php echo $line['name'];?>"> <?php echo $line['name'];?> </option>  
	<?php } ?> 	
	<br>
	</select>
<input type="submit"><br>
</form>	