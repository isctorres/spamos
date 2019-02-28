<?php
	class Conexion{
		
		//private $host = "127.0.0.1";
		private $host = "localhost";
		private $user = "root";
		private $pwd  = "";
		private $bd   = "spam_db";
		private $con  = null;

		public function __construct() {
			$this->con = mysqli_connect($this->host,$this->user,$this->pwd,$this->bd);
			if( $this->con->connect_error ){
				die("Error de conexion");
			}
		}
		
		public function getConexion(){
			return $this->con;
		}
		
  }
?>