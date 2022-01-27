<!DOCTYPE html>
<html>

<?php include("../archivos.php");
      include("../conexion.php");      
 ?>

<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
      <h3 align="center">Registro de Citas</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
    
        <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/calendario.png">
    </div>
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="GET" action="../Registros/registroCitas.php">
                  <fieldset>
                  <div class="control-group">
                    <label>Paciente</label>
                  <div class="controls">
                    <select name="paciente">
                      <?php
                        $paciente=$conexion->prepare("SELECT id,nombre,ap_paterno,ap_materno FROM paciente");
                        $paciente->execute();
                        while ( $lista=$paciente->fetch()) {
                          echo "<option value='".$lista[0]."'>".$lista[1]." ".$lista[2]." ".$lista[3]."</option>";
                        }
                       ?>

                    </select>
                  </div>
                </div>
                  <div class="control-group">
                    <div class="controls">
                    <label>Datos de la Cita</label>
                    <br>
                      <input type="date" name="fecha" placeholder="Fecha   Ejemplo-> 30-12-2014" required>
                    </div>
                  </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="lugar" placeholder="Lugar" required>
                  </div>
                </div>
                 <div class="control-group">
                  <div class="controls">
                    <input type="text"  name="horario" placeholder="Horario   Ejemplo-> 13:00 hrs" required>
                  </div>
                </div>
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit"class="btn">Registrar</button>
                  </div>
              </div>
                </form>
  </div>
      
<!-- ------------------------------------------------------------------------------------------- -->
  <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            Control Agend, Marzo de 2014
        </h3>
    </div>
  </div>

</body>
</html>