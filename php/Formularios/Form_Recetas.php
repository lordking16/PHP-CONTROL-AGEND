<!DOCTYPE html>
<html>

  <?php include("../archivos.php");
        include("../conexion.php");
   ?>

<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
      <h3 align="center">Recetas</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
    
        <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/catalogo.png">
    </div>
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="GET" action="../Registros/registroRecetas.php">
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
                    <label>Medicamento</label>
                  <div class="controls">
                    <select name="medicamento">
                      <?php
                        $medic=$conexion->prepare("SELECT id,M_nombre FROM medicamento");
                        $medic->execute();
                        while ( $result=$medic->fetch()) {
                          echo "<option value='".$result[0]."'>".$result[1]."</option>";
                        }
                       ?>

                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="observ" placeholder="Observaciones" required>
                  </div>
                </div>
                 
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <input type="submit" value="Registrar"/>
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