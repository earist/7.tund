<?php
	require_once("functions.php");
	
	//kas kustutame, ?delete = vastav id mida kustutada on aadressireal
	if(isset($_GET["delete"])){
		echo "Kustutame id" .$_GET["delete"];
		//käivitan funktsiooni, saadan kaasa id
		deleteCar($_GET["delete"]);
	
	}
	//salvestan andmebaasi
	if(isset($_POST["save"])){
		updateCar($_POST["id"], $_POST["plate_number"], $_POST["color"]);
	}
	
	//käivitan funktsiooni
	$car_array = getCarData();
	
	//trükin välja esimese auto
	//echo $car_array[0]->id." ".$car_array[0]->plate;
	
?>

<h2>Tabel</h2>
<table border="1">
	<tr>
		<th>Id</th>
		<th>User id</th>
		<th>Numbrimärk</th>
		<th>Värv</th>
		<th>X</th>
		<th>Edit</th>
	</tr>

	<?php
		//trükime välja read
		//massiivi pikkus count()
		for($i = 0; $i < count($car_array); $i++){
			//echo $car_array[$i]->id;
			
			//kasutaja tahab muuta seda rida
			if(isset($_GET["edit"]) && $car_array[$i]->id == $_GET["edit"]){
				
				echo "<tr>";
				echo "<form action='table.php' method='post'>";
				echo "<input type='hidden' name='id' value='".$car_array[$i]->id."'>";
				echo "<td>".$car_array[$i]->id."</td>";
				echo "<td>".$car_array[$i]->user_id."</td>";
				echo "<td><input name='plate_number' value ='".$car_array[$i]->plate."'></td>";
				echo "<td><input name='color' value ='".$car_array[$i]->color."'></td>";
				echo "<td><a href='table.php'>Cancel</a></td>";
				echo "<td><input type='submit' name='save'></td>";
				echo "</tr>";
				echo "</form>";
				
			}else{
				echo "<tr>";
				echo "<td>".$car_array[$i]->id."</td>";
				echo "<td>".$car_array[$i]->user_id."</td>";
				echo "<td>".$car_array[$i]->plate."</td>";
				echo "<td>".$car_array[$i]->color."</td>";
				echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";
				echo "<td><a href='?edit=".$car_array[$i]->id."'>edit</a></td>";
				echo "</tr>";
			}
			
			
		}
	
	?>
</table>