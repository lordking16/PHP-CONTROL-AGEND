<?php
    class db_mysql{	

		private $basededatos='controlagend2';
        private $servidor='localhost';
        private $usuario='root';
        private $password='';
        public $enlace;		
					
		/**
		 * Contructor de la clase. Conecta con la base de datos y crea un enlace de conexion,
		 * ademas selecciona la base de datos y envia un mensaje de error, si alguno ocurriese.
		 */
        public function __construct(){	       
            if (!($this->enlace=@mysql_connect($this->servidor,$this->usuario,$this->password))){
				$this->oops("Error conectando a la base de datos");
                exit();            
            }
            if (!@mysql_select_db($this->basededatos,$this->enlace)){
				$this->oops("Error seleccionando la base de datos.");
                exit();
            }
        }
 
		/**	
		 * Devuelve un set de registros
		 * @param $sql
		 *   Una cadena que contiene una sentencia sql
		 * @return array
		 *   Es un registro de una tabla
		 */
      	public function Sqlqueryrow($sql){
          $rs=mysql_query($sql, $this->enlace);
          $row=mysql_fetch_array($rs);
          return $row;
      	}

		/**	
		 * Devuelve un vector o una matriz de datos
		 * @param $sql
		 *   Una cadena que contiene una sentencia sql
		 * @return array
		 *   Es una tabla
		 */
      	public function Sqlqueryrs($sql){	
            $rs=mysql_query($sql, $this->enlace);
            return $rs;
      	}
		
		
		
	  	public function query($sql) { 
			$result = mysql_query ($sql, $this->enlace);
			return $result; 
	   	} 
	   
	   	public function fetch($sql) { 
			$data = array(); 
			$result = $this->query($sql); 
			while($row = mysql_fetch_assoc($result)) { 
		  		$data[] = $row; 
			} 
			return $data; 
	   	} 

  
		/**	
		 * Ejecutar una consulta directa sin retorno
		 * @param $sql
		 *   Una cadena que contiene una sentencia sql
		 */
      	public function Sqlcommand($sql){
            $rs=mysql_query($sql, $this->enlace);
      	}

      	/**
		 * Destructor de la clase. Cierra la conexion d ela base de datos.
		 */
      	public function __destruct(){
              mysql_close($this->enlace);
      	}
				
		/**
		 * Para proposito desarrollo y depuracion. Imprime una consulta sql
		 * @param $sql
		 *   Una cadena que contiene una sentencia sql
		 * @return $string
		 *   Una tabla de los registros obtenidos de la consulta sql
		 */
	    public function dump_query($sql) {
      		$r = $this->Sqlqueryrs($sql);	  	 
      		if (!$r) return false;
      		echo "<div style=\"border: 1px solid blue; font-family: sans-serif; margin: 8px;\">";
      		echo "<table cellpadding=\"3\" cellspacing=\"1\" border=\"0\" width=\"100%\">";
      		
      		$i = 0;
      		while ($row = mysql_fetch_assoc($r)) {
         		if ($i == 0) {
            		echo "<tr><td colspan=\"".count($row)."\"><span style=\"font-face: monospace; font-size: 11x; color:red;  letter-spacing: 3px;\">$sql</span></td></tr>";
            		echo "<tr>";
            		foreach ($row as $col => $value) {
               			echo "<td bgcolor=\"#E6E5FF\"><span style=\"font-face: sans-serif; font-size: 12px; font-weight: bold;\">$col</span></td>";
            		}
            		echo "</tr>";
         		}//Endif
         		$i++;
         		if ($i % 2 == 0) $bg = '#E3E3E3';
         		else $bg = '#F3F3F3';
         		echo "<tr>";
         		foreach ($row as $value) {
            		echo "<td bgcolor=\"$bg\"><span style=\"font-face: sans-serif; font-size: 10px;\">$value</span></td>";
         		}
         		echo "</tr>";
      		}//EndWhile
      		echo "</table></div>";
   		}

	 	/**
	     * Ejecuta un archivo que contenga comandos sql.
	     * @param $file
	     *   Es un cadena que contiene la direccion y el nombre de un archivo.
	     */	
	 	public function execute_sql_file ($file) {
		        
      		if (!file_exists($file)) {
         		echo "El archivo $file no existe.";
         		return false;
      		}
      		$str = file_get_contents($file);
      		if (!$str) {
         		echo "No se puede leer el contenido del archivo";
         		return false; 
      		}
   
      		//Divide todos lo query's dentro de un array
      		$sql = explode(';', $str);
      		foreach ($sql as $query) {
         		if (!empty($query)) {
            	$r = mysql_query($query);
            		if (!$r) {
               			$this->last_error = mysql_error();
               			return false;
            		}
         		}
      		}
      		return true;    
   		}
  
		/**
	 	 * Escapa caracteres y evita de esta manera inyecciones a mysql.
	 	 * @param $string
	 	 *   Cadena que sera escapada
	 	 * @return $string
	 	 *   Es una cadena escapada
	 	 */
		public function escape($string) {
			if(get_magic_quotes_runtime()) $string = stripslashes($string);
			return @mysql_real_escape_string($string,$this->enlace);
		}
		
		/**
		 * Imprime Errores
		 * @param $msg
		 *   (opcional) Una cadena que contiene un mensaje de error
		 */
		public function oops($msg='') {
			if($this->enlace>0){
				$this->error=mysql_error($this->enlace);
				$this->errno=mysql_errno($this->enlace);
			}
			else{
				$this->error=mysql_error();
				$this->errno=mysql_errno();
			}
			?>
			<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
			<tr><th colspan=2>Database Error</th></tr>
			<tr><td align="right" valign="top">Message:</td><td><?php echo $msg; ?></td></tr>
			<?php if(!empty($this->error)) echo '<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>'.$this->error.'</td></tr>'; ?>
			<tr><td align="right">Date:</td><td><?php echo date("l, F j, Y \a\\t g:i:s A"); ?></td></tr>
			<?php if(!empty($_SERVER['REQUEST_URI'])) echo '<tr><td align="right">Script:</td><td><a href="'.$_SERVER['REQUEST_URI'].'">'.$_SERVER[		'REQUEST_URI'].'</a></td></tr>'; ?>
		<?php if(!empty($_SERVER['HTTP_REFERER'])) echo '<tr><td align="right">Referer:</td><td><a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER[		'HTTP_REFERER'].'</a></td></tr>'; ?>
			</table>
			<?php
			}
			
	  
			
}//End class



/*
$db= new db_mysql();
//$sql="select*from usuarios where nombre_usuario ='".$db->escape($nombre)."' LIMIT 1";
//$sql="select*from usuarios where nombre_usuario ='".$db->escape('admin')."' LIMIT 1";
$sql="select*from eventos";
$db->dump_query($sql);
echo $sql;
*/

?>