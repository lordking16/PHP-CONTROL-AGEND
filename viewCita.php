<!DOCTYPE html>
<html>
<link href="../../jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css">
<link href="../../jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css">
<script src="../../jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="../../jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<?php 	
		//include("db.inc.php");
        include("php/conexion.php");
		include("archivos.php");
		

   ?>

    <body>
    <div data-role="page" id="catalogos">
      <div data-theme="a" data-role="header">
        <h3>Cita del Paciente</h3>
        <a href="Pagina_Medico.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Inicio</a> </div>
      <div data-role="content"> <br>
        				<?php
					include("php/db.inc.php");
					$db=new db_mysql();
					$sql="SELECT   p.nombre,
         p.apellidopaterno,
         p.apellidomaterno,
         p.edad,
         p.fechanacimiento,
         pe.tipoSangre,
         pe.alergias,
         pe.diagnostico,
         pe.servicio,
         pe.noservicio,
         pe.patologias
FROM pacientes p
JOIN perfiles pe ON p.perfiles_id=pe.id AND p.id=1;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
        <div class="ui-grid-a">
          <div class="ui-block-a">Nombre:</div>
                  <div class="ui-block-b"><?php echo $fila["nombre"]."".$fila["apellidopaterno"]."".$fila["apellidomaterno"]; ?></div>
                  <div class="ui-block-a">Edad:</div>
                  <div class="ui-block-b"><?php echo $fila["edad"]; ?></div>
                  <div class="ui-block-a">Tipo de Sangre:</div>
                  <div class="ui-block-b"><?php echo $fila["tipoSangre"]; ?></div>
                  <div class="ui-block-a">Diagnostico:</div>
                  <div class="ui-block-b"><?php echo $fila["diagnostico"]; ?></div>
                  <div class="ui-block-a">Alergias:</div>
                  <div class="ui-block-b"><?php echo $fila["alergias"]; ?></div>
                  <div class="ui-block-a">Servicio:</div>
                  <div class="ui-block-b"><?php echo $fila["servicio"]; ?></div>
                  <div class="ui-block-a">Número de Servicio:</div>
                  <div class="ui-block-b"><?php echo $fila["noservicio"]; ?></div>
                  <div class="ui-block-a">Patologias:</div>
                  <div class="ui-block-b"><?php echo $fila["patologias"]; ?></div>
        </div>
			<?php }
                ?>
			<a href="php/Consultas/viewHistorial.php" data-role="button">Ver Historial</a>
<br>

<form class="form-horizontal" method="GET" action="../Registros/registroRecetas.php">
                  <fieldset>
                  <div class="control-group">
                    <label>Medicamento</label>
                  <div class="controls">
                    <select name="medicamento">
                      <?php
                        $medic=$conexion->prepare("SELECT id,nombre,presentacion,viaadministracion FROM medicamentos");
                        $medic->execute();
                        while ( $result=$medic->fetch()) {
                          echo "<option value='".$result[0]."'>".$result[1]." (".$result[2]." - ".$result[3].")</option>";
                        }
                       ?>

                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="observ" placeholder="Indicaciones: " required>
                  </div>
                </div>
                 
                </fieldset>                
            <div data-role="fieldcontain">
              <label for="textarea">Diagnostico: </label>
              <textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>
            </div>
            <div data-role="fieldcontain">
              <label for="textarea2">Observaciones:</label>
              <textarea cols="40" rows="8" name="textarea2" id="textarea2"></textarea>
            </div>   
            <input name="terminar" type="button" value="Terminar">
           </form>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> Sep de 2014 </h3>
      </div>
    </div>
    </div>
    </body>
</html>