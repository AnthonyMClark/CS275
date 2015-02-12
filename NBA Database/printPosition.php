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
	$data = mysqli_query($con, "SELECT players.firstname, players.lastname, positions.name
						FROM players 
						INNER JOIN playerPositions
						ON players.ID = playerPositions.plaid
						INNER JOIN positions
						ON playerPositions.posid = positions.ID
						") 
		or die(mysqli_error()); 
	Print "<table><th colspan = 3>PLAYER POSITIONS</th>
	<tr><th>First Name</th><th>Last Name</th><th>Position</th></tr>"; 
	while($info = mysqli_fetch_array( $data )) 
	{ 
		Print "<tr><td>".$info['firstname'] . "</td> "; 
		Print "<td>".$info['lastname'] . " </td>"; 
		Print "<td>".$info['name'] . " </td>"; 
	}
	Print "</table>"; 

?>
