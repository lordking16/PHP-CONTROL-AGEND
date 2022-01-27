<!DOCTYPE html>
<html>

  <?php include("../archivos.php"); ?>

<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3 align="center">Cambiar mis datos</h3> 
      <a href="../../Pagina_Paciente.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
		 <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/user_dato.png">
    </div>
        
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <fieldset>
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" id="usuario" name="nombre" placeholder="Nombre" required>
                    </div>
                  </div>
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" id="usuario" name="ap_pat" placeholder="Apellido Paterno" required>
                    </div>
                  </div>
                  <div class="control-group">
                   
                    <div class="controls">
                      <input type="text" id="usuario" name="ap_mat" placeholder="Apellido Materno" required>
                    </div>
                  </div>
                  <div class="control-group">
                 
                    <div class="controls">
                      <select name="sexo">
                        <option>Masculino</option>
                        <option>Femenino</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="controls">
                      <input type="date" id="usuario" name="fecha" placeholder="Apellido Materno" required>
                    </div>
                  </div>
                  <div class="control-group">
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