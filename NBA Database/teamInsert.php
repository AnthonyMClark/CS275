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
	/* Team Information */
	$teamName = mysqli_real_escape_string($con, $_POST['teamName']);
	$teamCity = mysqli_real_escape_string($con, $_POST['teamCity']);
	/*Insert Team*/
	$sql = "INSERT INTO teams(name, city)
	VALUES('$teamName', '$teamCity')"; 
	
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	header( 'Location: teamPage.php' ) ;
?>