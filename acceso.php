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
        <form class="formLogin" method="POST" action="admon.php">
            <img class="mb-4" src="resources/images/celular.png" alt="" width="90" height="100">
            <h1 class="h3 mb-3 font-weight-normal">Autenticación</h1>
            <!--<label for="inputEmail" class="sr-only">Correo Electrónico</label>-->
            <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Nombre de Usuario" required autofocus>
            <!--<label for="inputPassword" class="sr-only">Password</label>-->
            <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordar sesión
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" >Autenticarse</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        </form>
    </body>
</html>