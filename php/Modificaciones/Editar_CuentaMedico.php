<?php
  include("../conexion.php");
  session_start();

    $CMedico=$conexion->prepare("UPDATE medico SET usuario=:nuser, contrasena=:npass WHERE id=:id_medico");

      $CMedico->bindParam(':id_medico',$id_medico);
      $CMedico->bindParam(':nuser',$usuario);
      $CMedico->bindParam(':npass',$contra);

      $id_medico=$_SESSION['id_usuario'];
      $usuario=$_GET["usuario"];
      $contra=$_GET["contrasena"];

      $CMedico->execute();

      $filas=$CMedico->rowCount();
      if ($filas>0) 
        //header("Location: ../../Pagina_Medico.php")

        echo "<html><body><script type='text/javascript'>
         document.location.href='../../Pagina_Medico.php';
      </script></body></html>";
      


 ?>