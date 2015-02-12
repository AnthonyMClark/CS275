<?php
	//ini_set('display_errors', 1);
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

	/*Insert Player and Position into PlayerPositions table*/
	$sql = "INSERT INTO playerPositions(plaid, posid)
	VALUES((SELECT ID FROM players WHERE lastname = '$lastName'), 
	(SELECT ID FROM positions WHERE name = '$position'))";

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	header( 'Location: positionsPage.php' ) ;
?>