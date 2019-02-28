<?php
    $arrTelefonos = array();
    if( isset($_POST['txtUsuario']) ){

        if( $_POST['txtUsuario'] == 'rubensin' && $_POST['txtPassword'] == '123456' ){
            if( file_exists("telefonos_spam.txt") )
                $arrTelefonos = file("telefonos_spam.txt");
        }
        else{
            header('location: acceso.php?estatus=0');
        }
    }
    else{
        if( isset($_GET['noTelefono']) ){
            $telBuscar = $_GET['noTelefono'];
            $arrTelefonos = file("telefonos_spam.txt");

            $posicion = 0;
            $encontrado = false;
            while($posicion < count($arrTelefonos) && !$encontrado ){
                $arTelefono = explode("~",$arrTelefonos[$posicion]);
                if( $arTelefono[0] == $telBuscar )
                    $encontrado = true;
                $posicion++;                    
            }

            if( $encontrado )
            {
                $arreglo1 = array_slice($arrTelefonos,0,$posicion-1);
                $arreglo2 = array_slice($arrTelefonos,$posicion,count($arrTelefonos)-$posicion);
                $arrTelefonos = array_merge($arreglo1,$arreglo2);

                $file = fopen("telefonos_spam.txt","w");
                foreach ($arrTelefonos as $tel ) {
                    fwrite($file,$tel);
                }
                fclose($file);
            }
        }
        else
            if( isset($_POST['noTelefonoUp']) )
            {
                $telBuscar = $_POST['noTelefonoUp'];
                $remitente = $_POST['txtRemitenteUp'];
                $arrTelefonos = file("telefonos_spam.txt");

                $posicion = 0;
                $encontrado = false;
                while($posicion < count($arrTelefonos) && !$encontrado ){
                    $arTelefono = explode("~",$arrTelefonos[$posicion]);
                    if( $arTelefono[0] == $telBuscar ){
                        $arTelefono[1] = $remitente;
                        $arrTelefonos[$posicion] = $arTelefono[0]."~".$arTelefono[1].PHP_EOL;
                    }
                    $posicion++;                    
                }

                $file = fopen("telefonos_spam.txt","w");
                foreach ($arrTelefonos as $tel ) {
                    fwrite($file,$tel);
                }
                fclose($file);
                $arrTelefonos = file("telefonos_spam.txt");
            }
    }
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

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form name="frmEdicion" id="frmEdicion" method="POST" action="admon.php">
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
                            <button type="submit" class="btn btn-default" >Actualizar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
            <tbody>
                <?php
                $scope = 1;
                 foreach ($arrTelefonos as $tel) {
                    $arTelefono = explode("~",$tel);
                 ?>
                <tr>
                    <th scope="row"><?php $scope?></th>
                    <td><?php echo $arTelefono[0]?></td>
                    <td><?php echo $arTelefono[1]?></td>
                    <td><button type="button" class="btn btn-primary" onclick="verEdicion('<?php echo $arTelefono[0]?>','<?php echo trim($arTelefono[1])?>')">Editar</button></td>
                    <td><button type="button" class="btn btn-danger" onclick="eliminarNumero(<?php echo $arTelefono[0]?>)">Borrar</button></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </form>
    </body>
</html>