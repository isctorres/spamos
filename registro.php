<?php
    if( isset($_POST["noTelefono"]) ){
        $noTelefono = "";
        $noTelefono = $_POST["noTelefono"];
        $titulo = "Resultado de la busqueda";
    
        $colorAlerta = "danger";
        $soloLectura = "";
        $nomRemitente = "";
        $bodyForm = "";
        $footer = "";
        $cajasTexto = "";

        // Validacion de 10 caracteres en el telefono
        $patron = "/^([0-9]{10})$/";
        if( !preg_match($patron,$noTelefono) ){
            $mensaje = "<strong>Error</strong> El número es incorrecto ";
        }
        else{
            // Predefinimos el mensaje de error, desde un inicio a no encontrado
            $mensaje = "<strong>Upss!!</strong> El número no se encontro...";
            $footer  = "<button type='button' class='btn btn-default' onclick='guardarNumero()'>Guardar</button>";

            // Leemos el archivo y lo volcamos a un arreglo
            if( file_exists("telefonos_spam.txt") ){
                $arrTelefonos = file("telefonos_spam.txt");
                foreach ($arrTelefonos as $tel) {
                    $arTelefono = explode("~",$tel);
                    if( $noTelefono == $arTelefono[0] ){
                        $mensaje = "<strong>Exito</strong> El número ya esta registrado: ";
                        $colorAlerta = "success";
                        $nomRemitente = trim($arTelefono[1]);
                        $soloLectura = "readonly='readonly'";
                        $footer = "";
                    }
                }
            }
            
            $cajasTexto = '<div class="form-group">'.
                            '<input type="text" class="form-control" name="noTelefonoReg" id="noTelefonoReg" value="'.$noTelefono.'" readonly="readonly">'.
                        '</div>'.
                        '<div class="form-group">'.
                            '<input type="text" class="form-control" name="txtRemitente" id="txtRemitente" name="txtRemitente" value="'.$nomRemitente.'" placeholder="Introduce el remitente" '.$soloLectura.'>'.
                        '</div>';

        }
    }
    else{
        $titulo = "Resultado del registro";
        $colorAlerta = "success";
        $cajasTexto = "";
        $footer = "";
        if( isset($_POST["noTelefonoReg"]) ){
            
            $noTelefono = $_POST["noTelefonoReg"];
            $nomRemitente = $_POST["txtRemitente"];

            $file = fopen("telefonos_spam.txt","a");
            fwrite($file,$noTelefono.'~'.$nomRemitente.PHP_EOL);
            fclose($file);
            $mensaje = "\nEl número de telefono se registro correctamente";
        }
        else{
            header("location: consulta.php");
            exit(0);
        }
    }

    echo '<div class="modal-header">';
        echo '<h5 class="modal-title">'.$titulo.'</h5>';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
    echo '</div>';
        echo '<div class="modal-body">'.
            '<form name="frmRegistro" id="frmRegistro">'.
                '<div class="row">'.
                    '<div class="col-2"><img src="./resources/images/celular.png" alt="Telefono Celular" width="80px" height="100px"></div>'.
                        '<div class="col-10">'.
                            '<div class="alert alert-'.$colorAlerta.'" role="alert">'.
                                $mensaje. 
                            '</div>'.
                            $cajasTexto.
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</form>'.
        '</div>';
    echo '<div class="modal-footer">'.
            $footer.
            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>'.
        '</div>';
?>


    
<?php
    /*if( isset($_GE["encontrado"]) )
    {
        $encontradoArchivo = $_GET["encontrado"];
        if( $encontradoArchivo ){
            // Mostrar informacion de telefono y descripcion
        }
        else{
            // Mostrar pantalla de registro
        }
    }
    else{
        header("Location:consulta.php");
        exit;
    }


   */
    
?>