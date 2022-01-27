r<!DOCTYPE html>
<html>

  <?php include("../archivos.php"); ?>

<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
      <h3 align="center">Edición Recetas</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
    <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/receta.png">
    </div>
        
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">

                <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <div class="control-group">
                              <label>Paciente</label>
                            <div class="controls">
                              <select name="paciente">
                                <option>Selecione</option>
                              </select>
                            </div>
                          </div>
                          <div class="control-group">
                  <div class="controls">
                    <button type="submit"class="btn">Buscar</button>
                  </div>
              </div>
                </form>
                
                <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <fieldset>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="lugar" placeholder="Observaciones" required>
                  </div>
                </div>
                 
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit"class="btn">Editar</button>
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