<!DOCTYPE html>
<html>

  <?php include("../archivos.php");
        include("../conexion.php");

   ?>

<body>
<div data-role="page" id="catalogos">
		<div data-theme="a" data-role="header">
			<h3>CATÁLOGOS</h3>
      <a href="../../Pagina_Medico.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Inicio</a>
      
    </div>
    <div class="ui-grid-a" align="center">
      <img style="width:35%" src="../../imagenes/catalogo.png">
    </div>
		<div data-role="content">
                <br>
                <ul data-role='listview'>
                   <li><a data-transition="flow" data-inline="true" href="#pacientes">Lista de pacientes</a></li>
                   <li><a  data-transition="flow" data-inline="true" href="#citas">Citas</a></li>
                  <li><a  data-transition="flow" data-inline="true" href="#recetas">Recetas</a></li>
                  <li><a  data-transition="flow" data-inline="true" href="#medicamentos">Medicamentos</a></li> 
                   
                </ul>   
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
		<h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>

      <!--Inicia pagina de pacientes-->

<div data-role="page" id="pacientes">
    <div data-theme="a" data-role="header">
      <h3>Pacientes</h3>
      <a href="#catalogos" data-transition="flow" data-role="button" data-icon="back" data-iconpos="left">Catálogos</a>
      
    </div>

    <div data-role="content">
       <h3>Listado de pacientes</h3>
                <br>
                
                  <?php
                        $paciente=$conexion->prepare("SELECT id,nombre,ap_paterno,ap_materno,sexo,f_nacimiento FROM paciente");
                        $paciente->execute();
                        while ( $lista=$paciente->fetch()) {
                          echo "<div data-role='collapsible'>
                           <h4>".$lista[1]." ".$lista[2]." ".$lista[3]."</h4>
                          <p>Id: ".$lista[0]."</p>
                          <p>Sexo: ".$lista[4]."</p>
                          <p>Fecha Nacimiento: ".$lista[5]."</p>
                          </div>";
                        }
                       ?>
                </div>   
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>


                    <!--Inicia pagina de citas-->


<div data-role="page" id="citas">
    <div data-theme="a" data-role="header">
      <h3>Citas</h3>
      <a href="#catalogos" data-transition="flow" data-role="button" data-icon="back" data-iconpos="left">Catálogos</a>
      
    </div>

    <div data-role="content">


                <br>
                  <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
                  <div class="control-group">
                              <label>Citas</label>
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
                    <button type="submit"class="btn">Buscar</button>
                  </div>
              </div>
                </form>
                <h4>Lista de citas por pacientes</h4>
                <br>
                <?php
                  $citas=$conexion->prepare("SELECT  fecha,lugar,horario,paciente,nombre,ap_paterno,ap_materno FROM citas INNER JOIN paciente WHERE citas.paciente=paciente.id");
                  $citas->execute();
                  while ($datos=$citas->fetch()) {
                    echo "<ul data-role='listview'>
                  <li>
                    <h4>Paciente: ".$datos[4]." ".$datos[5]." ".$datos[6]."</h4>
                    <p>Fecha: ".$datos[0]."</p>
                    <p>Hora: ".$datos[2]."</p>
                    <p>Lugar: ".$datos[1]."</p>
                  </li>
                </ul>";
                  }
                 ?>
                   
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>



          <!--Inicia pagina de recetas-->


<div data-role="page" id="recetas">
    <div data-theme="a" data-role="header">
      <h3>Recetas</h3>
      <a href="#catalogos" data-transition="flow" data-role="button" data-icon="back" data-iconpos="left">Catálogos</a>
      
    </div>

    <div data-role="content">


                <br>
                  <form class="form-horizontal" method="POST" action="php/Inicio_sesion.php">
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
                    <button type="submit"class="btn">Buscar</button>
                  </div>
              </div>
                </form>
                 <h5>Lista de recetas por pacientes</h5>
                <br>
                
                  <?php
                        $recetas=$conexion->prepare("SELECT nombre,ap_paterno,ap_materno,medicamento_id,observaciones FROM recetas INNER JOIN paciente WHERE recetas.paciente_id=paciente.id");
                        $recetas->execute();
                        while ( $filas=$recetas->fetch()) {
                          echo "<div data-role='collapsible'>
                                <h4>".$filas[0]." ".$filas[1]." ".$filas[2]."</h4>
                                <p>".$filas[3]."</p>
                                <p>".$filas[4]."</p>
                          </div>";
                        }
                       ?>  
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>
    
          <!--Inicia pagina de medicamentos-->


<div data-role="page" id="medicamentos">
    <div data-theme="a" data-role="header">
      <h3>Recetas</h3>
      <a href="#catalogos" data-transition="flow" data-role="button" data-icon="back" data-iconpos="left">Catálogos</a>
      
    </div>

    <div data-role="content">
      <h3>Lista de medicamenos</h3>
                <br>
               
                  <?php
                        $medic=$conexion->prepare("SELECT * FROM medicamento");
                        $medic->execute();
                        while ( $rows=$medic->fetch()) {
                          echo " <ul data-role='listview'> 
                            <li>
                              <h4>".$rows[1]."</h4>
                              <p>Id: ".$rows[0]."</p>
                              <p>Administración: ".$rows[2]."</p>
                            </li>
                          </ul> ";
                        }
                       ?>
                   
                 
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>



</body>
</html>