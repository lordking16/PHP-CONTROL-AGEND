<!DOCTYPE html>
<html>

<?php include("archivos.php");
  session_start();
 ?>
<head>
<style>
	.thEstilo
	{
		color:#FFF;
		background-color:#000;
	}
</style>

<script type="text/javascript">
	$(document).ready(function()
{
  $("tr:even").css("background-color", "#F00");
    $("tr:even").css("color", "#FFF");
});
</script>
</head>
<body>
<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
			<h3>Control Agend (Médico)</h3>
      <a href="index.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Cerrar Sesion</a>
      <a href="php/Formularios/Form_Configuracion.php" data-transition="flow" data-role="button" data-icon="gear" data-iconpos="right">Configuración</a>
		   <!--<div data-role="navbar" data-iconspos="buttom">
    <ul>
     <li><a href='php/Consultas/Catalogos.php'  data-transition="flow" data-inline="true" data-theme='a' data-icon="gear" rel="external">Catálogos</a></li>
    </ul>
  </div>-->
    </div>
  <div class="ui-grid-a" align="center">
      <img style="width:35%" src="imagenes/medico.png">
    </div>
		<div data-role="content">
              <div data-role="collapsible-set" data-theme="a">
            <div>
                <h3 align="center"> Citas</h3>
		<table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo"><h3>Paciente</h3></th>
                        <th class="thEstilo"><h3>Fecha</h3></th>
                        <th class="thEstilo"><h3>Confirmacion</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php
					include("php/db.inc.php");
	
					$db=new db_mysql();
					$sql="SELECT * from citas";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000" ><?php echo $fila["id"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["fecha"] ?></td>
                        
<?php if($fila["confirmacion"]>0)
	{?>
    <td id="con" bordercolor="#000000">SI</td>
    <?php
	}else{?>  
    <td id="con" bordercolor="#000000">NO</td>
    <?php }?>                     
    <td bordercolor="#000000"><?php echo "SÍ / NO"; ?></td>
        <td bordercolor="#000000"><a href="viewCita.php">Entrar</a></td>

                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
            <br>
      </div>
            <div data-role="collapsible" data-collapsed="true" data-inset="false">
                <h3> Pacientes</h3>
                <ul data-role='listview'>
                  
                  <li><a   data-transition="flow" data-inline="true" href="php/Consultas/listaPacientes.php" >Lista de Pacientes</a></li>   
                </ul>
            </div>
            </div>
            <div data-role="collapsible-set" data-theme="a">
              <div data-role="collapsible" data-collapsed="true">
                  <h3> Recetas</h3>
                   <ul data-role='listview'>
                      <li><a  data-transition="flow" data-inline="true" href="php/Formularios/Form_Recetas.php">Nueva</a></li>
                   <li><a  data-transition="flow" data-inline="true" href="php/Formularios/Form_formatoReceta.php">Formato</a></li>
                  </ul>
            </div>
          </div>
          <div data-role="collapsible-set" data-theme="a">
              <div data-role="collapsible" data-collapsed="true">
                  <h3> Medicamentos</h3>
                   <ul data-role='listview'>
                      <li><a  data-transition="flow" data-inline="true" href="php/Formularios/Form_Medicamentos.php">Nuevo</a></li>
                   <li><a  data-transition="flow" data-inline="true" href="php/Consultas/listaMedicamentos.php">Lista</a></li>

                  </ul>
            </div>
          </div>
        </div>
        
    <div data-theme="a" data-role="footer" data-position="fixed">
		<h3>
            ITVH, Mayo de 2014
        </h3>
    </div>
</div>
</body>
</html>