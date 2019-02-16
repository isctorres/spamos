<?php
    if( isset($_POST['txtUsuario']) ){

        if( $_POST['txtUsuario'] == 'rubensin' && $_POST['txtPassword'] == '123456' ){
            $arrTelefonos = file("telefonos_spam.txt");
        }
        else{
            header('location: acceso.php?estatus=0');
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
        <script src="./resources/js/functions.js"></script>
    </head>
    
    <body class="text-center gradiente">
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
                    <td><button type="button" class="btn btn-primary">Editar</button></td>
                    <td><button type="button" class="btn btn-danger">Borrar</button></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </form>
    </body>
</html>