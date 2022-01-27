<!DOCTYPE html>
<html>
<link href="../../jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css">
<link href="../../jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css">
<script src="../../jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="../../jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function()
{
  $("tr:even").css("background-color", "#F00");
    $("tr:even").css("color", "#FFF");
});
</script>
<?php 	
		//include("../db.inc.php");
		include("../archivos.php");
        include("../conexion.php");
		include("../archivos.php");
		

   ?>

<body>
<div data-role="page" id="catalogos">
      <div data-theme="a" data-role="header">
        <h3>Historial</h3>
        <a href="../../Pagina_Medico.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Inicio</a> </div>
        
        
        
  <table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo"><h3>Fecha</h3></th>
                        <th class="thEstilo"><h3>Observaciones</h3></th>
                        <th class="thEstilo"><h3>Diagnostico</h3></th>
						<th class="thEstilo"><h3>Receta</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php
					include("../db.inc.php");
	
					$db=new db_mysql();
					$sql="SELECT   p.nombre,
         c.id,
         c.fecha,
         cp.observaciones,
         cp.diagnostico,
         cp.recetas_id
FROM pacientes p
JOIN historial h ON h.pacientes_id=p.id
JOIN citashistorial cp ON h.id=cp.historial_id
JOIN citas c ON c.id= cp.citas_id;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000"><?php echo $fila["fecha"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["observaciones"];//$fila["status"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["diagnostico"];//$fila["status"] ?></td>
                        <td bordercolor="#000000"><a href="viewReceta.php"><?php echo $fila["recetas_id"];?></a></td>
                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
<div data-theme="a" data-role="footer" data-position="fixed">
    <h3> Sep de 2014 </h3>
      </div>
    </div>
    </div>
    </body>
</html>