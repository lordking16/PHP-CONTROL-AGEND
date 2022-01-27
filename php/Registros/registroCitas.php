<?php

include_once("../conexion.php");
session_start();

try{
	$citas= $conexion->prepare("INSERT INTO citas (fecha,lugar,horario,paciente,medico) VALUES (:fecha,:lugar,:horario,:paciente,:medico)"); //creamos la sentencia preparada
		$citas->bindParam(':fecha',$fecha);
		$citas->bindParam(':lugar',$lugar);
		$citas->bindParam(':horario',$horario);
		$citas->bindParam(':paciente',$paciente);
		$citas->bindParam(':medico',$medico);

		$fecha=$_GET["fecha"];
		$lugar=$_GET["lugar"];
		$horario=$_GET["horario"];
		$paciente=$_GET['paciente'];
		$medico=$_SESSION['id_usuario'];

		//echo "nombre = ".$fecha.", ".$lugar.", ".$horario.",".$paciente.",".$medico."";

		$citas->execute();	//Ejecutamos la sentencia preparada
		header("Location: ../Formularios/Form_Citas.php");
}

catch(Exception $e){
		print "Hubo un error en la inserción". $e->getMessage()."<br/>";
		die();
	}

?>