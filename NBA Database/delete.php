<form action="playerDelete.php" method="post" >
	<h2>RETIRE (DELETE) A PLAYER:</h2>
	First Name: <input type="text" name="firstName" value=""><br>
	Last Name: <input type="text" name="lastName" value=""><br>
	Position: 
	<select name="position">
		<option name="position" value="Point Guard">Point Guard </option>
		<option name="position" value="Shooting Guard">Shooting Guard </option>
		<option name="position" value="Small Forward">Small Forward </option>
		<option name="position" value="Power Forward">Power Forward </option>
		<option name="position" value="Center">Center </option>
    </select><br> 
	(Please consult the <td><a href="http://web.engr.oregonstate.edu/~clarkant/275/Final/positionsPage.php"><b>positions</b></a></td>  page if unknown)
	<br>
	<input type="submit">
</form>