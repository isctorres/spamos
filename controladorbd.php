<?php
    require_once "modelos/Telefono.php";

    if( !isset($_POST['opc']) )
        header('Location:consultabd.php');

    $objTel = new Telefono();
    switch( $_POST['opc'] ){
        case 1: // CASO PARA BUSCAR EL NUMERO DE TELEFON Y REALIZAR LA VALIDACION DEL MISMO
            $titulo = "Resultado de la busqueda";
            $colorAlerta = "danger";
            $noTelefono = $_POST["noTelefono"];
            $patron = "/^([0-9]{10})$/";
            if( !preg_match($patron,$noTelefono) ){
                $mensaje = "<strong>Error</strong> El número es incorrecto ";
            }
            else{
                // Predefinimos el mensaje de error, desde un inicio a no encontrado
                $mensaje = "<strong>Upss!!</strong> El número no se encontro...";
                $footer  = "<button type='button' class='btn btn-default' onclick='guardarNumero()'>Guardar</button>";
    
                $sql = "SELECT * FROM tbl_directorio WHERE numero = '".$noTelefono."'";
                $resQuery = $objTel->consulta($sql);
                if( $resQuery->num_rows == 1 ){
                    $mensaje = "<strong>Exito</strong> El número ya esta registrado: ";
                    $colorAlerta = "success";
                    $nomRemitente = $arTelefono[1];
                    $soloLectura = "readonly='readonly'";
                    $footer = "";
                }
                
                $cajasTexto = '<div class="form-group">'.
                                '<input type="text" class="form-control" name="noTelefonoReg" id="noTelefonoReg" value="'.$noTelefono.'" readonly="readonly">'.
                            '</div>'.
                            '<div class="form-group">'.
                                '<input type="text" class="form-control" name="txtRemitente" id="txtRemitente" name="txtRemitente" value="'.$nomRemitente.'" placeholder="Introduce el remitente" '.$soloLectura.'>'.
                            '</div>';
    
            }
            ContentModal($titulo,$colorAlerta,$mensaje,$cajasTexto,$footer);
            break;
        case 2: // CASO PARA REGISTRAR EL NÚMERO DE TELEFONO
            $titulo      = "Resultado del registro";
            $colorAlerta = "success";
            $noTelefono  = $_POST["noTelefono"];
            $cajasTexto  = "";
            $footer      = "";
            
            $noTelefono   = $_POST["noTelefonoReg"];
            $nomRemitente = $_POST["txtRemitente"];
            $sql = "INSERT INTO tbl_directorio(entidad,numero) VALUES('".$noTelefono."','".$nomRemitente."')";
            $objTel->consulta($sql);
            if( $objTel->rowsAffected() == 1 )
                $mensaje = "\nEl número de telefono se registro correctamente";
            else
                $mensaje = "\nNo se pudo completar la acción, intente de nuevo";
            ContentModal($titulo,$colorAlerta,$mensaje,$cajasTexto,$footer);
    }

    function ContentModal($titulo,$colorAlerta,$mensaje,$cajasTexto,$footer){
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
    }
?>