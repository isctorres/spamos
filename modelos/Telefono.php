<?php
    include_once "modelos/Conexion.php";
	class Telefono{
    
        private $con = null;
        private $res = null;
        public function __construct() {
            $objCon = new Conexion();
            $this->con = $objCon->getConexion();
        }
        
        public function consulta($sql){
            return $this->res = $this->con->query($sql);
        }

        public function rowsAffected(){
            return $this->con->affected_rows;
        }

        public function rowsSelected(){
            return $this->res->num_rows;
        }

        public function getRow(){
            
        }
    }
?>