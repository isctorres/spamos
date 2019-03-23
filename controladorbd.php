<?php
    require_once "modelos/Telefono.php";

    if( !isset($_POST['opc']) )
        header('Location:consultabd.php');

    $objTel = new Telefono();
    // FILTRAMOS LA OPCION PARA EVITAR VALORES DIFERENTES A UN ENTERO
    $opc = filter_var($_POST['opc'],FILTER_SANITIZE_NUMBER_INT);
    switch( $opc ){
        case 1: // CASO PARA BUSCAR EL NUMERO DE TELEFONO Y REALIZAR LA VALIDACION DEL MISMO
            $titulo = "Resultado de la busqueda";
            $colorAlerta = "danger";

            // LIMPIAMOS EL NUMERO DE TELEFONO QUE DE ALGUNA MANERA ESTA DEMÁS
            $noTelefono = filter_var($_POST["noTelefono"],FILTER_SANITIZE_NUMBER_INT);
            $patron = "/^([0-9]{10})$/";
            if( !preg_match($patron,$noTelefono) ){
                $mensaje = "<strong>Error</strong> El número es incorrecto ";
            }
            else{
                // Predefinimos el mensaje de error, desde un inicio a no encontrado
                $mensaje = "<strong>Upss!!</strong> El número no se encontro...";
                $footer  = "<button type='button' class='btn btn-default' onclick='guardarNumeroBD()'>Guardar</button>";
                $nomRemitente = "";
                $soloLectura = ""; 

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
            $cajasTexto  = "";
            $footer      = "";
            
            $noTelefono   = $_POST["noTelefonoReg"];
            // SANITIZAMOS EL NOMBRE DEL REMITENTE
            $nomRemitente = mb_convert_encoding($_POST["txtRemitente"],'UTF-8');
            $nomRemitente = filter_var($nomRemitente,FILTER_SANITIZE_MAGIC_QUOTES);

            $sql = "INSERT INTO tbl_directorio(entidad,numero) VALUES('".$nomRemitente."','".$noTelefono."')";
            $objTel->consulta($sql);
            if( $objTel->rowsAffected() == 1 )
                $mensaje = "\nEl número de telefono se registro correctamente";
            else
                $mensaje = "\nNo se pudo completar la acción, intente de nuevo";
            ContentModal($titulo,$colorAlerta,$mensaje,$cajasTexto,$footer);
            break;
        case 3: // MOSTRAR NÚMEROS
            $scope = 1;
            $sql      = "select * from tbl_directorio";
            $resQuery = $objTel->consulta($sql); 
            while ( $tel = mysqli_fetch_array($resQuery) ) {
                echo '<tr>';
                    echo '<th scope="row">'.$scope.'</th>';
                    echo '<td>'.$tel[2].'</td>';
                    echo '<td>'.$tel[1].'</td>';
                    echo '<td><button type="button" class="btn btn-primary" onclick="verEdicionBD(\''.$tel[2].'\',\''.$tel[1].'\')">Editar</button></td>';
                    echo '<td><button type="button" class="btn btn-danger" onclick="eliminarNumeroBD(\''.$tel[2].'\')">Borrar</button></td>';
                echo '</tr>';
                $scope++;
            }
            break;
        case 4: // ACTUALIZAR NÚMERO
            $noTelefono = $_POST['noTelefonoUp'];
            // SANITIZAMOS EL NOMBRE DEL REMITENTE
            $remitente = mb_convert_encoding($_POST["txtRemitenteUp"],'UTF-8');
            $remitente = filter_var($remitente,FILTER_SANITIZE_MAGIC_QUOTES);
            $sql      = "update tbl_directorio set entidad = '".$remitente."' where numero = '".$noTelefono."'";
            $objTel->consulta($sql);
            //echo $objTel->rowsAffected(); 
            break;
        case 5: // ELIMINAR NÚMERO
            $noTelefono = $_POST['noTelefono'];
            $sql      = "delete from tbl_directorio where numero = '".$noTelefono."'";
            $objTel->consulta($sql);
            //echo $objTel->rowsAffected(); 
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