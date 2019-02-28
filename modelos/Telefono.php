<?php
    include_once "modelos/Conexion.php";
	class Telefono{
    
        private $con = null;
        public function __construct() {
            $objCon = new Conexion();
            $this->con = $objCon->getConexion();
        }
        
        public function consulta($sql){
            return $this->con->query($sql);
        }

        public function rowsAffected(){
            return $this->con->affected_rows;
        }
    }
?>