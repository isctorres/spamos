<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/os/spamos/sesiones/librerias/securimage/securimage.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/os/spamos/modelos/Empleado.php';
    $errores = array("Error en usuario y/o contraseña","Error en captcha");

    if( isset($_POST['userEmail']) ){
        $captcha = new Securimage();
        if ($captcha->check($_POST['captcha_code']) == false) {
            $error = 1;
        }
        else{
            $objEmpleado = new Empleado();   
            $datosEmp = $objEmpleado->validaEmpleado($_POST['userEmail'],$_POST['userPassword']);
            $_SESSION['datosEmp'] = $datosEmp;
            header('Location: principal.php',);
            exit(0);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Acceso</title>
</head>
<body>
<form action="ingreso.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Bienvenido</h4>
                    <input type="email" id="userEmail" name="userEmail" class="form-control input-sm chat-input" placeholder="Email" required />
                    </br>
                    <input type="password" id="userPassword" name="userPassword" class="form-control input-sm chat-input" placeholder="Contraseña" required />
                    </br>
                    <img id="captcha" src="./librerias/securimage/securimage_show.php" alt="CAPTCHA Image" />
                    </br>
                    <input type="text" name="captcha_code" size="10" maxlength="6" required />
                    <a href="#" onclick="document.getElementById('captcha').src = './librerias/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                    <div class="wrapper">
                        <span class="group-btn">     
                            <button type="submit" class="btn btn-primary btn-md">Ingresar <i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</form>
</body>
</html>

