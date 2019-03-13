<?php
    session_start();
    print_r($_SESSION['datosEmp']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Principal</title>
</head>
<body>
    Bienvenido: <?= $_SESSION['datosEmp']['nomEmpleado']?> con Clave <?= $_SESSION['datosEmp']['idEmpleado']?>
</body>
</html>