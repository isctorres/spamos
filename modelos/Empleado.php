<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/os/spamos/modelos/Conexion.php';
    class Empleado{
    
        private $con = null;
        private $res = null;
        public function __construct() {
            $objCon = new Conexion();
            $this->con = $objCon->getConexion();
        }
        
        public function validaEmpleado($email,$pass){
            $consulta = $this->con->prepare("SELECT id_empleado, nombre FROM tbl_empleados WHERE email = ? AND password = md5(?)");           
            $consulta->bind_param("ss",$email,$pass);
            $consulta->execute();
            $consulta->bind_result($idEmpleado,$nomEmpleado);
            $consulta->fetch();
            return array('idEmpleado'=>$idEmpleado,'nomEmpleado'=>$nomEmpleado);
        }
    }
?>