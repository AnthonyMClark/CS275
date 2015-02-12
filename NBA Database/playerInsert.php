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
	$championships = mysqli_real_escape_string($con, $_POST['Championships']);
	/* Team Information */
	$teamName = mysqli_real_escape_string($con, $_POST['teamName']);
	$cityName = mysqli_real_escape_string($con, $_POST['cityName']);
	$result = mysqli_query($con,"SELECT id FROM teams WHERE name = '$teamName'");
	/*Insert Player*/
	$sql = "INSERT INTO players(tid, firstname, lastname, championships)
	VALUES((SELECT ID FROM teams WHERE name = '$teamName'), '$firstName', '$lastName', '$championships')"; 
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header( 'Location: playerPage.php' ) ;
?>