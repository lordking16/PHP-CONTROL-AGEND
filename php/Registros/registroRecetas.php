<?php

include_once("../conexion.php");
session_start();


try{
	$citas= $conexion->prepare("INSERT INTO recetas (medicamento_id,paciente_id,medico_id,observaciones) VALUES (:medicam,:paciente,:medico,:observ)"); //creamos la sentencia preparada
		$citas->bindParam(':medicam',$medicamento);
		$citas->bindParam(':paciente',$paciente);
		$citas->bindParam(':medico',$medico);
		$citas->bindParam(':observ',$observaciones);
		
		$medicamento=$_GET['medicamento'];
		$paciente=$_GET['paciente'];
		$medico=$_SESSION['id_usuario'];
		$observaciones=$_GET['observ'];

		//echo "nombre = ".$fecha.", ".$lugar.", ".$horario.",".$paciente.",".$medico."";

		$citas->execute();	//Ejecutamos la sentencia preparada
		header("Location: ../Formularios/Form_Recetas.php");
}

catch(Exception $e){
		print "Hubo un error en la inserción". $e->getMessage()."<br/>";
		die();
	}

?>