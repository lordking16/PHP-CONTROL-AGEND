<!DOCTYPE html>
<html>
<link href="../../jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css">
<link href="../../jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css">
<script src="../../jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="../../jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<?php 	
		include("../db.inc.php");
        include("../conexion.php");
		include("../archivos.php");
		

   ?>

    <body>
    <div data-role="page" id="catalogos">
      <div data-theme="a" data-role="header">
        <h3>Receta</h3>
        <a href="../../Pagina_Medico.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Inicio</a> </div>
      <div data-role="content"> <br>
        				<?php
	
					$db=new db_mysql();
					$sql="SELECT m.nombre,r.id,r.indicaciones,m.viaadministracion,m.presentacion FROM recetas r
JOIN medicamentos m ON r.medicamentos_id=m.id";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
        <div class="ui-grid-a">
          <div class="ui-block-a">Código de Receta:</div>
                  <div class="ui-block-b"><?php echo $fila["id"]; ?></div>
                  <div class="ui-block-a">Medicamento:</div>
                  <div class="ui-block-b"><?php echo $fila["nombre"]."(".$fila["presentacion"]."-".$fila["viaadministracion"].")"; ?></div>
                  <div class="ui-block-a">Indicaciones:</div>
                  <div class="ui-block-b"><?php echo $fila["indicaciones"]; ?></div>
                  
        </div>
			<?php }
                ?>
                
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> Sep de 2014 </h3>
      </div>
    </div>
    </div>
    </body>
</html>