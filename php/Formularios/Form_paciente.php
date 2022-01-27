<!DOCTYPE html>
<html>

  <?php include("../archivos.php"); ?>

<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3 align="center">Registro de Pacientes</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
		
      <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/pacientes2.png">
    </div>  
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="GET" action="../Registros/registroPaciente.php">
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
                 
                    <div class="controls">
                      <select name="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="controls">
                      <input type="date" name="fecha" required>
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