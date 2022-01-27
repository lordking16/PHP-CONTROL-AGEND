<?php
  include("../conexion.php");
 ?>
<!DOCTYPE html>
<html>
<?php include("../archivos.php"); ?>

<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3 align="center">Registro de Médicos</h3> 
      <a href="../../index.php" data-icon="back" rel="external">Inicio</a> 
  </div>
		<div class="ui-grid-a" align="center">
      <img style="width:40%" src="../../imagenes/doctor.png">
    </div>
        
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form method="GET" action="../Registros/registroMedico.php">
                  <fieldset>  
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                  </div>
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" name="ap_pat" placeholder="Apellido Paterno" required>
                    </div>
                  </div>
                  <div class="control-group">
                   
                    <div class="controls">
                      <input type="text" name="ap_mat" placeholder="Apellido Materno" required>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label>Especialidad</label>
                    <div class="controls">
                      <select name="especialidad">

                          <?php  
                            $sentencia = $conexion->prepare("SELECT * FROM especialidad"); //sql para imprimir las categorias
                            $sentencia->execute();
                            while ($categoria = $sentencia->fetch()) {
                              echo "<option value='".$categoria[0]."'>".$categoria[1]."</option>";
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                  </div>
                <div class="control-group">
                 
                  <div class="controls">
                    <input type="password" name="contrasena" placeholder="Contraseña" required>
                  </div>
                </div>
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <input name="guardar" type="submit" value="Registrar">
                  </div>
              </div>
                </form>
  </div>
      
<!-- ------------------------------------------------------------------------------------------- -->
	<div data-theme="a" data-role="footer" data-position="fixed">
		<h3>
            Control Agend, Mayo de 2014
        </h3>
    </div>
  </div>

</body>
</html>