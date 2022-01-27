<?php

include_once("../conexion.php");



try{
	$medico= $conexion->prepare("INSERT INTO medico (nombre,ap_paterno,ap_materno,usuario,contrasena,especialidad) VALUES (:nombre,:appat,:apmat,:usuario,:contrasena,:espe)"); //creamos la sentencia preparada
		$medico->bindParam(':nombre',$nombre);
		$medico->bindParam(':appat',$apat);
		$medico->bindParam(':apmat',$apmat);
		$medico->bindParam(':espe',$espe);
		$medico->bindParam(':usuario',$usuario);
		$medico->bindParam(':contrasena',$contrasena);


		$nombre=$_GET["nombre"];
		$apat=$_GET["ap_pat"];
		$apmat=$_GET["ap_mat"];
		$espe=$_GET['especialidad'];
		$usuario=$_GET["usuario"];
		$contrasena=$_GET["contrasena"];

		//echo "nombre = ".$nombre.", ".$apat.", ".$apmat.",".$espe.",".$usuario.",".$contrasena."";



		$medico->execute();	//Ejecutamos la sentencia preparada
		header("Location: ../Formularios/Form_medico.php");
}

catch(Exception $e){
		print "Hubo un error en la inserción". $e->getMessage()."<br/>";
		die();
	}

?>