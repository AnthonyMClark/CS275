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
	/* Game Information */
	$team1 = mysqli_real_escape_string($con, $_POST['team1']);
	$team2 = mysqli_real_escape_string($con, $_POST['team2']);
	$team1Score = mysqli_real_escape_string($con, $_POST['team1Score']);
	$team2Score = mysqli_real_escape_string($con, $_POST['team2Score']);
	$gameDate = mysqli_real_escape_string($con, $_POST['gameDate']);
	/*Insert Game Information*/
	$sql = "INSERT INTO games(team1Points, team2Points, tid1, tid2, gameDate)
	VALUES('$team1Score', '$team2Score', (SELECT ID FROM teams WHERE name = '$team1'), 
	(SELECT ID FROM teams WHERE name = '$team2'),
	'$gameDate')"; 

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	header( 'Location: gamePage.php' ) ;
?>