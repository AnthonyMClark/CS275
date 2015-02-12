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
		
	$gameData = mysqli_query($con, "SELECT teams1.name, teams2.name AS name2, games.team1Points, games.team2Points, gameDate
						FROM games 
						INNER JOIN teams AS teams1
						ON teams1.ID = games.tid1
						INNER JOIN teams AS teams2
						ON teams2.ID = games.tid2
						ORDER BY gameDate") 
		or die(mysqli_error()); 	
			
	Print "<table><th colspan = 5>GAMES PLAYED</th>
	<tr><th>Team</th><th>Points</th><th>Team</th><th>Points</th><th>Date</th></tr>"; 	
	while($info = mysqli_fetch_array( $gameData )) 
	{ 
		Print "<tr><td>".$info['name'] . "</td> "; 
		Print "<td>".$info['team1Points'] . " </td>"; 
		Print "<td>".$info['name2'] . " </td>"; 
		Print "<td>".$info['team2Points'] . " </td>"; 
		Print "<td>".$info['gameDate'] . " </td>"; 
		
	}
	Print "</table>"; 
?>
