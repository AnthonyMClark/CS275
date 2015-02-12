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

	/* Player Information */	
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$position = mysqli_real_escape_string($con, $_POST['position']);

	/*------delete from many to many-----------*/
	/*Get the playerID*/
	$sqlPlayer = mysqli_fetch_assoc(mysqli_query($con, "SELECT ID FROM players WHERE firstname = '$firstName' AND lastname = '$lastName'"))
		or die("Error selecting database: $dbname");
	$userID = $sqlPlayer['ID'];
	/*Get the positionID*/
	$sqlPosition = mysqli_fetch_assoc(mysqli_query($con, "SELECT ID FROM positions WHERE name = '$position'"))
		or die("Error selecting database: $dbname");
	$posID = $sqlPosition['ID'];
	/*Perform Delete from Playerpositions Table*/
	$sql =  mysqli_query($con, "DELETE 
		FROM playerPositions
		WHERE plaid = '$userID' AND posid = '$posID'")
		or die('Error: ' . mysqli_error($con));
	/*Perform Delete from players Table*/
	$deletePlayer =  mysqli_query($con, "DELETE 
		FROM players
		WHERE ID = '$userID'")
		or die('Error: ' . mysqli_error($con));
		mysqli_close($con);
	header( 'Location: playerPage.php' ) ;
?>