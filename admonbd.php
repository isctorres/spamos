<?php
    /*require_once "modelos/Telefono.php";
    $objTel   = new Telefono();
    
    // inserción de números telefónicos
    $sql      = "insert into tbl_directorio (entidad,numero) values('Rubensin','4612279090')";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Insertados: ".$noRows."<br>";

    // actualización de números telefónicos
    $sql      = "update tbl_directorio set entidad = 'Rubensito' where numero = '4612279090'";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Actualizados: ".$noRows."<br>";

    // borrar datos de números telefónicos
    $sql      = "delete from tbl_directorio where numero = '4612279090'";
    $objTel->consulta($sql);
    $noRows   = $objTel->rowsAffected(); 
    echo "Número de Registros Eliminados: ".$noRows."<br>";

    // consultar los números telefónicos
    $sql      = "select * from tbl_directorio";
    $objTel->consulta($sql);
    $noRows   =  $objTel->rowsSelected();
    echo "Número de Registro Obtenidos: ".$noRows;
    die();*/
?>

<!-- IMPLEMENTACION DE UN FORMULARIO-->
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Administrador</title>
        <link rel="stylesheet" href="resources/css/estilos.css">
        <link href="./resources/css/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="./resources/css/bootstrap-4.0.0-alpha.6-dist/js/jquery-3.3.1.min.js"></script>
        <script src="./resources/css/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
        <script src="./resources/js/functions.js"></script>
    </head>
    
    <body class="text-center gradiente">

        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form name="frmEdicionBD" id="frmEdicionBD">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Número</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-2"><img src="./resources/images/celular.png" alt="Telefono Celular" width="80px" height="100px"></div>
                                <div class="col-10">
                                    <div class="alert alert-default" role="alert">Actualizar Remitente!!!</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="noTelefonoUp" id="noTelefonoUp"readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="txtRemitenteUp" id="txtRemitenteUp" name="txtRemitente" placeholder="Introduce el remitente">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="editarNumero()" >Actualizar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div style="display:block">
            <form class="frmDatos">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Remitente</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody id="tbNumeros">
                </tbody>
            </table>
            </form>
        </div>
    </body>
</html>

<script>
    $("#tbNumeros").load("controladorbd.php",{opc:'3'});
</script>