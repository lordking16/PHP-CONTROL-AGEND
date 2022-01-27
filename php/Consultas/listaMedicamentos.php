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
      <div data-role="content">
            <ul data-role='ui-listview'>
                
                            <?php
        
                        $db=new db_mysql();
                        $sql="SELECT * FROM medicamentos m ORDER BY nombre ASC";
                        $vProductos=$db->fetch($sql);
                        foreach($vProductos as $i=>$fila){
                    ?>
                    <li class="ui-li-has-arrow ui-li ui-btn-active ui-btn-up-c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c">
                <div class="ui-btn-inner ui-li">
                    <div class="ui-btn-text">
                        <a class="ui-link-inherit" href="index.html">
<!--                        	<p class="ui-li-aside ui-li-desc">-->
                        	<h2 class="ui-li-heading"><?php echo $fila["nombre"]; ?></h2>
<!--                        	<p class="ui-li-desc">-->
                        	<p class="ui-li-desc"><?php echo $fila["presentacion"]." (".$fila["viaAdministracion"].")"?>.</p>
                        </a>
                    </div>
                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"> </span>
                </div>
        </li>
        <br>
                    
                    <?php }
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