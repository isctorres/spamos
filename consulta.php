    <!-- IMPLEMENTACION DE UN FORMULARIO-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Validar Telefonos</title>
        <link rel="stylesheet" href="resources/css/estilos.css">
        <link href="./resources/css/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="./resources/css/bootstrap-4.0.0-alpha.6-dist/js/jquery-3.3.1.min.js"></script>
        <script src="./resources/css/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
        <script src="./resources/css/bootstrap-4.0.0-alpha.6-dist/js/popper.min.js"></script>
        <script src="./resources/js/functions.js"></script>
    </head>
    <body class="gradiente">

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="content-modal">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center minh-100">
                <div class="col-lg-6">
                    <form name="frmConsulta" id="frmConsulta">
                        <div class="input-group mb-3">
                            <input type="text" size="30" class="form-control" name="noTelefono" id="noTelefono" placeholder="Introduce el número"/>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal" onclick="consultarTelefono()">
                                    Buscar Telefono
                                </button>
                            </div>
                        </div>
                    </form>
                   
                   <!-- <div>
                        <img class="img-fluid rounded mx-auto d-block" src="https://www.freepng.es/png-hd4lfq/download.html" alt="logo" width="25%" height="25%">
                    </div>
                    <div>
                        <p style="font-size:24px;" class="text-center"><i class="fas fa-info-circle"> Estamos en
                        Mantenimiento....</i></p>
                    </div>-->
                </div>
            </div>
        </div>
    </body>
    </html>
    
    
    