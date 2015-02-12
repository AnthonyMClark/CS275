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
	
	if(isset($_POST['teamName'])){
		$teamName = mysqli_real_escape_string($con, $_POST['teamName']);
		$data = mysqli_query($con, "SELECT players.firstname, players.lastname, players.championships, positions.name AS nameP, teams.name, teams.city
						FROM players 
						INNER JOIN teams
						ON teams.ID = players.tid
						INNER JOIN playerPositions
						ON players.ID = playerPositions.plaid
						INNER JOIN positions
						ON playerPositions.posid = positions.ID
						WHERE teams.name = '$teamName'
						ORDER BY players.lastname
						") 
		or die(mysqli_error());
	}
	else{
			$data = mysqli_query($con, "SELECT players.firstname, players.lastname, players.championships, positions.name AS nameP, teams.name, teams.city
						FROM players 
						INNER JOIN teams
						ON teams.ID = players.tid
						INNER JOIN playerPositions
						ON players.ID = playerPositions.plaid
						INNER JOIN positions
						ON playerPositions.posid = positions.ID
						ORDER BY players.lastname
						") 
		or die(mysqli_error());
	}
	 
	Print "<table><th colspan = 6>PLAYER PROFILES</th>
	<tr><th>First Name</th><th>Last Name</th><th>Championships</th><th>Position</th><th>City</th><th>Team</th></tr>"; 
	while($info = mysqli_fetch_array( $data )) 
	{ 
		Print "<tr><td>".$info['firstname'] . "</td> "; 
		Print "<td>".$info['lastname'] . " </td>";
		Print "<td>".$info['championships'] . " </td>";	
		Print "<td>".$info['nameP'] . " </td>";
		Print "<td>".$info['city'] . " </td>"; 
		Print "<td>".$info['name'] . " </td>"; 
	}
	Print "</table><br>"; 
	
	if(isset($_POST['teamName'])){
		$teamName = mysqli_real_escape_string($con, $_POST['teamName']);
		$gameData = mysqli_query($con, "SELECT teams1.name, teams2.name AS name2, games.team1Points, games.team2Points, gameDate
							FROM games 
							INNER JOIN teams AS teams1
							ON teams1.ID = games.tid1
							INNER JOIN teams AS teams2
							ON teams2.ID = games.tid2
							WHERE teams1.name = '$teamName' OR teams2.name = '$teamName'
							ORDER BY gameDate") 
			or die(mysqli_error()); 
	}	
	else{
		$gameData = mysqli_query($con, "SELECT teams1.name, teams2.name AS name2, games.team1Points, games.team2Points, gameDate
							FROM games 
							INNER JOIN teams AS teams1
							ON teams1.ID = games.tid1
							INNER JOIN teams AS teams2
							ON teams2.ID = games.tid2
							ORDER BY gameDate") 
			or die(mysqli_error()); 	
	}		
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
