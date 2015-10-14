<?php
	require_once("../config_global.php");
	$database = "if15_earis_3";
	
	function getEditData($edit_id){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("i", $edit_id);	//bind_param asendab küsimärgid
		$stmt->bind_result($number_plate, $color);
		$stmt->execute();
		
		$car = new StdClass();
		
		//kas sain ühe rea andmeid kätte
		//$stmt->fetch() annab ühe rea andmeid
		if($stmt->fetch()){
			//sain
			
			$car->number_plate =$number_plate;
			$car->color=$color;
			
			
		}else{
			//ei saanud:
			//1.id'd ei olnud olemas, ntid=12312312312313
			//2.rida on kustutatud, deleted ei ole NULL
			header("Location:table.php");	 //See viib tagasi table esilehele
		}
		return $car;
		$stmt->close();
		$mysqli->close();
		
	}
	function updateCar($id, $number_plate, $color){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET number_plate=?, color=? WHERE id=?");
		$stmt->bind_param("ssi", $number_plate, $color, $id);
		if($stmt->execute()){
			//sai kustutatud, kustutame aadressirea tühjaks
			//header("Location: table.php");
			
		}
		$stmt->close();
		$mysqli->close();
		
	}

?>