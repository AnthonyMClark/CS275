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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Anthony Clark Assignment Final:1</title>
	<meta charset="utf-8"/>
	<link rel ="stylesheet" type = "text/css" href = "Style.css">
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script>
	$(function() {	//run on load
 RecordHandling("");
 //alert("test");

 $('#frm').submit(function(e) {
 	e.preventDefault();
 	var formData = $(this).serialize();
 	console.log(formData);
 	RecordHandling(formData);
 });
});

function RecordHandling(formData) {
console.log(formData);
 $.ajax({	url: 'printTest.php',
 	type: 'POST',
 	dataType: 'text',
 	data: formData,
 	success: function(data) {
 	document.getElementById("tablePrint").innerHTML = data;
 	$("#frm")[0].reset();
 	$('#searchButton').removeAttr('disabled');
 	console.log(data);
 	},
 	error: function(XMLHttpRequest, textStatus, errorThrown) {
 	alert("The site experienced a server side issue, please contact the site admin.");
 	}
 });
}	
	</script>
	<style>
		body{
		background-image:url('bgcolor.png');
		background-color:#3B0B17;
		} 
		table{
		background-color:#B45F04;
		color: #424242;
		}
		td{
		color: white
		}
	</style>	
</head>
<body>
	<h1>CS275 Final Project</h1>
	<h2>NBA OVERVIEW DATABASE</h2>
	<h3>Anthony Clark | Joshua Smith</h3>

<div id="userIn">
<table><tr>
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/playerPage.php"><b>Player</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/gamePage.php"><b>Games</b></a></td>
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/positionsPage.php"><b>Positions</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/teamPage.php"><b>Teams</b></a></td> 
</tr></table>
</div>
<form action="printTest.php" method="post" id ="frm">
	Select Team:<br>
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
<br><br>
<div id = "tablePrint">
</div>
<br><br>	
</body>
</html>