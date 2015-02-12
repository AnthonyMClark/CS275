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
	//Print the table
	$data = mysqli_query($con, "SELECT teams.name, teams.city
						FROM teams 
						") 
		or die(mysqli_error()); 
	Print "<table><th colspan = 5>NBA TEAMS</th>
	<tr><th>City</th><th>Team</th></tr>"; 
	while($info = mysqli_fetch_array( $data )) 
	{ 
		Print "<tr><td>".$info['city'] . " </td>"; 
		Print "<td>".$info['name'] . " </td>"; 
	}
	Print "</table>"; 
?>
