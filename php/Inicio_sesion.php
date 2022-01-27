<?php
	
	include_once("conexion.php"); //incluimos el archivo de conexion a la BD
	$tipo_usuario=$_POST["radio"] ; //obtenemos los datos del formulario por el metodo POST


	if ($tipo_usuario=="medico") {

			$sesion=$conexion->prepare("SELECT id,user,pass FROM medicos WHERE user=:user AND pass=:pass");

			$sesion->bindParam(':user',$usuario);
			$sesion->bindParam(':pass',$contrasena);

			$usuario=$_POST["usuario"];
			$contrasena=$_POST["contrasena"];
			$sesion->execute();
			$resultado=$sesion->rowCount();
			echo $resultado;

		if ($resultado>0) {
			$id=$sesion->fetch();
			session_start();
			$_SESSION["id_usuario"]=$id[0];
			
			echo "MEdico iniciado";
			
			echo "<html><body><script type='text/javascript'>
			   document.location.href='../Pagina_Medico.php';
			</script></body></html>";
		}
		else{
			header("Location: ../index.php");
		}	
	}
			
		/*else if ($tipo_usuario=="paciente")
			$sesion=$conexion->prepare("SELECT id,usuario,contrasena FROM paciente WHERE usuario=:usuario AND contrasena=:contrasena");

			$sesion->bindParam(':usuario',$usuario);
			$sesion->bindParam(':contrasena',$contrasena);

			$usuario=$_GET["usuario"];
			$contrasena=$_GET["contrasena"];
			$sesion->execute();
			$resultado=$sesion->rowCount();


		if ($resultado>0) {
			$id=$sesion->fetch();
			session_start();
			$_SESSION["id_usuario"]=$id[0];

			//header("Location: ../Pagina_Medico.php");

			echo "<html><body><script type='text/javascript'>
			   document.location.href='../Pagina_Paciente.php';
			</script></body></html>";
		}*/
		else{
			header("Location: ../index.php");
		}
?>