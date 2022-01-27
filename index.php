<!DOCTYPE html>
<html>
<?php include("archivos.php"); ?>
<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3>CONTROL AGEND V2</h3>
      <div data-role="navbar" data-iconspos="buttom">
    <ul>
     <li><a href='php/Formularios/Form_medico.php'  data-transition="flow" data-inline="true" data-theme='a' data-icon="gear">Registro de Médicos</a></li>
    </ul>
  </div>
  
  </div>
		
		<div class="ui-grid-a" align="center">
		  <img src="imagenes/control_agend.png">
	  </div>
      
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
        <div data-role="collapsible-set" data-theme="a">
            <div data-role="collapsible" data-collapsed="false">
                <h3>
                    Ingresar
                </h3>
                <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <fieldset>
                  <div class="control-group">
                    
                    <div class="controls">
                      <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                  </div>
                   <div class="control-group">
                    <div class="controls">      
                      <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup" data-type="horizontal">
                          <legend>Tipo de Usuario: </legend>
                          <input type="radio" name="radio" id="radio1_0" value="medico" />
                          <label for="radio1_0">Medico</label>
                          <input type="radio" name="radio" id="radio1_1" value="paciente" />
                          <label for="radio1_1">Paciente</label>
                        </fieldset>
                      </div>
                      </p>
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
                    <input type="submit"  value="Iniciar"/>
                  </div>
              </div>
                </form>

            </div>   
        </div>
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