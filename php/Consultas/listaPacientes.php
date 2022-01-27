<!DOCTYPE html>
<html>
<?php 	
		include("../db.inc.php");
        include("../conexion.php");
		include("../archivos.php");
		

   ?>

<body>
<div data-role="page" id="catalogos">
      <div data-theme="a" data-role="header">
        <h3>Lista de Pacientes</h3>
        <a href="../../Pagina_Medico.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Inicio</a> </div>
      <div data-role="content"> <br>
        <ul data-role='listview'>
        				<?php
	
					$db=new db_mysql();
					$sql="SELECT * FROM pacientes p ORDER BY apellidopaterno,apellidomaterno,nombre ASC;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                <li><a data-transition="flow" data-inline="true" href="viewPaciente.php"><?php echo $fila["apellidopaterno"]." ".$fila["apellidomaterno"]." ".$fila["nombre"]; ?></a></li>
				<?php  }
                ?>
        </ul>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> Sep de 2014 </h3>
      </div>
    </div>
    </div>
    </body>
</html>