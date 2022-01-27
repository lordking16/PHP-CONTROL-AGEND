<!DOCTYPE html>
<html>
<?php
	include("php/db.inc.php");
?>
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
	h3
	{
		color:#FFF;
	}
</style>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript">
	$(document).ready(function()
{
  $("tr:even").css("background-color", "#F00");
  $("tr:even").css("color", "#FFF");
  $("a:even").css("color", "#000");
  $("a:odd").css("color", "#FFF");
	
});
</script>
</head>

<body>
<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
			<h3>ADMIN MEDICO</h3>
      <a href="index.php" data-transition="flow" data-role="button" data-icon="home" data-iconpos="left">Cerrar Sesion</a>
      <a href="php/Formularios/Form_Configuracion.php" data-transition="flow" data-role="button" data-icon="gear" data-iconpos="right">Configuración</a>
<!--		   <div data-role="navbar" data-iconspos="buttom">
    <ul>
     <li><a href='php/Consultas/Catalogos.php'  data-transition="flow" data-inline="true" data-theme='a' data-icon="gear" rel="external">Catálogos</a></li>
    </ul>
  </div>-->
    </div>
  <div class="ui-grid-a" align="center">
      <img style="width:35%" src="imagenes/medico.png">
    </div>
		<div data-role="content">
      <?php // echo "<h3>id: ".$_SESSION["id_usuario"]." </h3>"; ?>

      
            <div data-role="collapsible-set" data-theme="a">
              <div data-role="collapsible" data-collapsed="true">
                  <h3> Citas</h3>
                  
                  <table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo thPaciente"><h3>Paciente</h3></th>
                        <th class="thEstilo"><h3>Fecha</h3></th>
                        <th class="thEstilo"><h3>Lugar</h3></th>
                        <th class="thEstilo"><h3>Asistencia</h3></th>
                        <th class="thEstilo"><h3>Accion</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php	
					$db=new db_mysql();
					$sql="SELECT p.nombre,p.ap_paterno,p.ap_materno, c.fecha,c.lugar,c.horario FROM citas c
INNER JOIN paciente p ON c.paciente=p.id;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000" ><?php 
						echo $fila["nombre"]." ".$fila["ap_paterno"]." ".$fila["ap_materno"];
						 ?></td>
                        <td bordercolor="#000000"><?php echo $fila["fecha"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["lugar"] ?></td>
                        <td bordercolor="#000000"><?php echo "No Confirmada";//$fila["status"] ?></td>
                        <td bordercolor="#000000"> <a href="">Editar | Eliminar</a></td>
                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
              </div>
          </div>
<div data-role="collapsible-set" data-theme="a">
            <div data-role="collapsible" data-collapsed="true" data-inset="false">
                <h3> Pacientes</h3>
                <table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo"><h3>Nombre(s)</h3></th>
                        <th class="thEstilo"><h3>Apellido Paterno</h3></th>
                        <th class="thEstilo"><h3>Apellido Materno</h3></th>
                        <th class="thEstilo"><h3>Nacimiento</h3></th>
                        <th class="thEstilo"><h3>Accion</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php	
					$sql="SELECT * FROM paciente p;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000" ><?php echo $fila["nombre"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["ap_paterno"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["ap_materno"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["f_nacimiento"] ?></td>
                        <td bordercolor="#000000"> <a href="">Editar | Eliminar</a></td>
                    </tr>
				<?php }
                ?>
                </tbody>
            </table>

			</div>
            </div>
          <div data-role="collapsible-set" data-theme="a">
              <div data-role="collapsible" data-collapsed="true">
                  <h3>Medicamentos/Recetas</h3>
                  <h2>Medicamentos</h2>
                  <table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo"><h3>Nombre(s)</h3></th>
                        <th class="thEstilo"><h3>Vía de Administración</h3></th>
                        <th class="thEstilo"><h3>Accion</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php	
					$sql="SELECT * FROM medicamento;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000" ><?php echo $fila["M_nombre"] ?></td>
                        <td bordercolor="#000000"> <?php echo $fila["administracion"] ?></td>
                        <td bordercolor="#000000"> <a href="">Editar | Eliminar</a></td>
                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
                                      
    <br>
    <br>
                <h2>Recetas</h2>
                <table cellpadding="5" cellspacing="5" border="3" id="tablaCitas" align="center" class="tabla">
                <thead>
                    <tr>
                        <th class="thEstilo"><h3>Paciente</h3></th>
                        <th class="thEstilo"><h3>Medicamento</h3></th>
                        <th class="thEstilo"><h3>Accion</h3></th>
                    </tr> 
                </thead>
                <tbody>
				<?php	
					$sql="SELECT p.nombre, m.m_nombre FROM recetas r
INNER JOIN paciente p ON r.paciente_id=p.id
INNER JOIN medicamento m ON m.id=r.medicamento_id;";
					$vProductos=$db->fetch($sql);
  					foreach($vProductos as $i=>$fila){
				?>
                    <tr>
                        <td bordercolor="#000000" ><?php echo $fila["nombre"] ?></td>
                        <td bordercolor="#000000"><?php echo $fila["m_nombre"] ?></td>
                        <td bordercolor="#000000"> <a href="">Editar | Eliminar</a></td>
                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
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