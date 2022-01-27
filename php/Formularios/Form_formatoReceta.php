<!DOCTYPE html>
<html>

  <?php include("../archivos.php");
        include("../conexion.php");
   ?>

<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
      <h3 align="center">Formato de Recetas</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
    <div data-role="content">
  		<form action="" method="post" name="subirFormato">
        <input name="formato" type="file">
        <br>
        <input name="enviar" type="submit" value="Subir">
        </form>              

  	</div>

  <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            Control Agend, Marzo de 2014
        </h3>
    </div>
  </div>

</body>
</html>