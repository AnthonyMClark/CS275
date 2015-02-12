<!DOCTYPE html>
<html lang="en">
<head>
	<title>Anthony Clark Assignment Final:1</title>
	<meta charset="utf-8"/>
	<link rel ="stylesheet" type = "text/css" href = "Style.css">
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
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
	<h1>CS275 Final Project: Player Page</h1>
	<h2>NBA OVERVIEW DATABASE</h2>
	<h3>Anthony Clark | Joshua Smith</h3>
<table>	
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/members.php"><b>Main</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/teamPage.php"><b>Teams</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/gamePage.php"><b>Games</b></a></td>
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/positionsPage.php"><b>Positions</b></a></td>
</table><br>
<div id="userIn">
<table><tr>
<td><button class="myButton" name ="it" onclick="playerFunction()">Add a Player</button></td> <div id ="player"></div>
<td><button class="myButton" name ="it" onclick="championshipFunction()">Update Championships</button></td> <div id ="championships"></div>
<td><button class="myButton" name ="it" onclick="removeFunction()">Retire a Player</button></td> <div id ="remove"></div>
</tr></table>
</div>
<br><br>
<script>
		function playerFunction()
		{
			$.ajax({
				url: "http://web.engr.oregonstate.edu/~clarkant/275/Final/player.php",
				dataType: 'text',
				success: function(data){
				document.getElementById("player").innerHTML = data;
				},
			});
		};
		function championshipFunction()
		{
			$.ajax({
				url: "http://web.engr.oregonstate.edu/~clarkant/275/Final/championships.php",
				dataType: 'text',
				success: function(data){
				document.getElementById("championships").innerHTML = data;
				},
			});
		};
		function removeFunction()
		{
			$.ajax({
				url: "http://web.engr.oregonstate.edu/~clarkant/275/Final/delete.php",
				dataType: 'text',
				success: function(data){
				document.getElementById("remove").innerHTML = data;
				},
			});
		};
</script>		

<div id = "tablePrint">
		<?php
			include "printPlayer.php";
		?>
</div>
<br><br>
</body>
</html>