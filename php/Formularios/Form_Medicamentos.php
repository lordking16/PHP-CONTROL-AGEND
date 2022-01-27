<!DOCTYPE html>
<html>

  <?php include("../archivos.php"); ?>

<body>
  <div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
      <h3 align="center">Medicamentos</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
        <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/medicamento.png">
    </div>
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="GET"   action="../Registros/registroMedicamentos.php">
                  <fieldset>
                 
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="controls">
                    <input type="text" name="presentacion" placeholder="Presentación" required>
                  </div>
                </div>
                 <div class="control-group">
                  <label>Via de Administración</label>
                  <div class="controls">
                    <select name="via_admin">
                      <option value="oral">Oral</option>
                       <option value="cutánea">Cutánea</option>
                        <option value="inyección">Inyección</option>
                    </select>
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
            Control Agend, Mayo de 2014
        </h3>
    </div>
  </div>

</body>
</html>