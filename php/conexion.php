<?php
// en este archivo vamos a configurar los parámetros necesarios para conectar nuestras bd con la libreria pdo_mysql
	
	$dsn="mysql:host=localhost;dbname=controlagend2"; //ponemos los origenes de datos(sintaxis); [gestor de bd]:host=[localhost];dbname=[base_datos]
	$usuario="root"; //se especifica el nombre de ususario
	$contrasena=""; //se especifica la contraseña

try{
	//iniciamos con un intento para conectarnos a la bd
	$conexion=new PDO($dsn,$usuario,$contrasena);//creamos una instancia del objeto pdo
}
catch (Exception $e){
	print "Hubo un error al conectarse a la base de datos". $e->getMessage()."<br/>"; //señalamos el error con un mensaje
	die(); //terminar intento de conexion
}
?>