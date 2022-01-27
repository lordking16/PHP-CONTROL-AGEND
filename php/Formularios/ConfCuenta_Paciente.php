<!DOCTYPE html>
<html>

    <?php include("../archivos.php"); ?>

<body>
	<div data-role="page" id="page1">

    <div data-role="header">

      <h3 align="center">Configurar mi  Cuenta</h3> 
      <a href="../../Pagina_Paciente.php" data-icon="back" rel="external" data-transition="flow">Inicio</a> 
  

    </div>
      
		 <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/user_cuenta.png">
    </div>
        
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
                
                <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <fieldset>
                  
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" id="usuario" name="usuario" placeholder=" Nuevo Usuario" required>
                    </div>
                  </div>
                <div class="control-group">
                  <div class="controls">
                    <input type="password" id="contra" name="contrasena" placeholder="Contraseña" required>
                  </div>
                </div>
                 <div class="control-group">
                  <div class="controls">
                    <input type="password" id="contra" name="contrasena" placeholder="Confirmar Contraseña" required>
                  </div>
                </div>
                </fieldset>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit"class="btn">Configurar</button>
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