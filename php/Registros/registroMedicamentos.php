<?php

include_once("../conexion.php");

try{
	$medic= $conexion->prepare("INSERT INTO medicamento (M_nombre,administracion) VALUES (:nombre,:admin)"); //creamos la sentencia preparada
		$medic->bindParam(':nombre',$nombre);
		$medic->bindParam(':admin',$admin);
		
		$nombre=$_GET["nombre"];
		$admin=$_GET["via_admin"];

		$medic->execute();	//Ejecutamos la sentencia preparada
		header("Location: ../Formularios/Form_Medicamentos.php");
}

catch(Exception $e){
		print "Hubo un error en la inserción". $e->getMessage()."<br/>";
		die();
	}

?>