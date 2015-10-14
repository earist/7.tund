<?php
	//edit.php
	
	

?>

<h2>Muuda autonumbrimärki</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label for ="number_plate">Auto numbrimärk</label><br>
		<input id="number_plate" name="number_plate" type="text" value="<?php echo $number_plate; ?>" > <?php echo $number_plate_error; ?><br><br>
		<label for ="color">Värv</label><br>
		<input id="color" name="color" type="text" value="<?php echo $color; ?>"> <?php echo $color_error; ?> <br><br>
		<input type="submit" name="add_plate" value="Sisesta"><br>
		</form>	