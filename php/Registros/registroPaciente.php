<?php

include_once("../conexion.php");



try{
	$paciente= $conexion->prepare("INSERT INTO paciente (nombre,ap_paterno,ap_materno,sexo,f_nacimiento,usuario,contrasena) VALUES (:nombre,:appat,:apmat,:sexo,:f_nac,:usuario,:contrasena)"); //creamos la sentencia preparada
		$paciente->bindParam(':nombre',$nombre);
		$paciente->bindParam(':appat',$apat);
		$paciente->bindParam(':apmat',$apmat);
		$paciente->bindParam(':sexo',$sexo);
		$paciente->bindParam(':f_nac',$nacimiento);
		$paciente->bindParam(':usuario',$usuario);
		$paciente->bindParam(':contrasena',$contrasena);


		$nombre=$_GET["nombre"];
		$apat=$_GET["ap_pat"];
		$apmat=$_GET["ap_mat"];
		$sexo=$_GET["sexo"];
		$nacimiento=$_GET["fecha"];
		$usuario=$_GET["usuario"];
		$contrasena=$_GET["contrasena"];

		//echo "nombre = ".$nombre.", ".$apat.", ".$apmat.",".$sexo.",".$fecha.",".$usuario.",".$contrasena."";

		$paciente->execute();	//Ejecutamos la sentencia preparada
		header("Location: ../Formularios/Form_Paciente.php");
}

catch(Exception $e){
		print "Hubo un error en la inserción". $e->getMessage()."<br/>";
		die();
	}

?>