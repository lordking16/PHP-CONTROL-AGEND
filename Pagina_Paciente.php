
<!DOCTYPE html>
<html>

  <?php include("archivos.php"); ?>
  <head>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  </head>

<body>
	<div data-role="page" id="page1">
		<div data-theme="a" data-role="header">
      <h3>PÁGINA PACIENTE</h3>
      <a href="index.php" data-role="button" data-icon="home" data-iconpos="left">Cerrar Sesion</a>
	  
       <div data-role="navbar" data-iconspos="buttom">
    <ul>
     <li><a href='php/Modificaciones/Editar_Paciente.php'  data-transition="flow" data-inline="true" data-theme='a' data-icon="star"><h5>Editar mis datos</h5></a></li>
     <li><a href='php/Modificaciones/ConfCuenta_Paciente.php' data-transition="flow" data-inline="true" data-theme='a' data-icon="gear"><h5>Configurar mi cuenta</h5></a></li> 
    </ul>
  </div>
      </div>
    <div class="ui-grid-a" align="center">
      <img style="width:35%" src="imagenes/pacientes.png">
    </div>
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

                    </tr>
				<?php }
                ?>
                </tbody>
            </table>
            <br>
      </div>
<!-- ------------------------------------------------------------------------------ -->
<!-- --------------------------------------------------------------------------------- -->
    <div data-role="content">
      <br>
                <ul data-role='listview'>
                   <li><a  data-transition="flow" data-inline="true" href="php/Consultas/viewReceta.php">Ver mis recetas</a></li>
                  <li><a  data-transition="flow" data-inline="true" href="php/Formularios/Form_Citas.php">Agendar una cita</a></li>
                   
                </ul>   
    </div>
<!-- ------------------------------------------------------------------------------------------- -->
	<div data-theme="a" data-role="footer" data-position="fixed">
		<h3>
           ITVH, Marzo de 2014
        </h3>
    </div>
</div>

</body>
</html>