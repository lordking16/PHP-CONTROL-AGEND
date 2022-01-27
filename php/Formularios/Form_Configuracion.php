<!DOCTYPE html>
<html>

<?php include("../archivos.php"); ?>

<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3 align="center">Configurar Cuenta</h3> 
      <a href="../../Pagina_Medico.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  </div>
		<div class="ui-grid-a" align="center">
      <img style="width:40%" src="../../imagenes/medico.png">
    </div>
        
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="GET" action="../Modificaciones/Editar_CuentaMedico.php">
                  <fieldset>
                  
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" name="usuario" placeholder=" Nuevo Usuario" required>
                    </div>
                  </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="password" name="contrasena" placeholder=" Nueva Contraseña" required>
                  </div>
                </div>
                 <!--<div class="control-group">
                  <div class="controls">
                    <input type="password" id="contra" name="contrasena" placeholder="Confirmar Contraseña" required>
                  </div>
                </div>-->
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <input type="submit" value="Configurar"/>
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