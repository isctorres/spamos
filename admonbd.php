<?php
    require_once "modelos/Telefono.php";
    $objTel   = new Telefono();
    
    $sql      = "insert into tbl_directorio (entidad,numero) values('Rubensin','4612279093')";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Insertados: ".$noRows."<br>";

    $sql      = "update tbl_directorio set entidad = 'Rubensito' where numero = '4612279093'";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Actualizados: ".$noRows."<br>";

    $sql      = "delete from tbl_directorio where numero = '4612279093'";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Eliminados: ".$noRows."<br>";

    $sql      = "select * from tbl_directorio";
    $resQuery = $objTel->consulta($sql);
    $noRows   = $resQuery->num_rows;
    echo "Número de Registro Obtenidos: ".$noRows;
?>