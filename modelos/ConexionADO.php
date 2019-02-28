<?php
    include("../resources/adodb5/adodb.inc.php"); // includes the adodb library

    class ConexionADO{
		  public function __construct() {}
      public function getConexionADO()
      {
        $db = NewADOConnection("mysqli"); // A new connection
        return $db->Connect("127.0.0.1", "root", "", "spam_db");
      }
    }

    $conexion = new ConexionADO();
    $conexion->getConexionADO();
    echo "Conexion Exitosa Usando ADO-DB!!!";
?>