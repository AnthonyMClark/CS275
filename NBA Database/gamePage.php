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
	<h1>CS275 Final Project: Games Page</h1>
	<h2>NBA OVERVIEW DATABASE</h2>
	<h3>Anthony Clark | Joshua Smith</h3>
<table>	
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/members.php"><b>Main</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/teamPage.php"><b>Teams</b></a></td> 
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/playerPage.php"><b>Players</b></a></td>
<td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/positionsPage.php"><b>Positions</b></a></td>
</table><br>
<div id="userIn">
<table><tr>
<td><button class="myButton" name ="it" onclick="gameFunction()">Add a Game</button></td> <div id ="game"></div>
</tr></table>
</div>
<br><br>
<script>
		function gameFunction()
		{
			$.ajax({
				url: "http://web.engr.oregonstate.edu/~clarkant/275/Final/game.php",
				dataType: 'text',
				success: function(data){
				document.getElementById("game").innerHTML = data;
				},
			});
		};
</script>		

<div id = "tablePrint">
		<?php
			include "printGame.php";
		?>
</div>
<br><br>
</body>
</html>