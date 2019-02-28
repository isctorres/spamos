function consultarTelefono(){
    var pagina = $("#frmConsulta").serialize();
    var url = "registro.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina,
        cache: false,
        success: function(data){
            $("#content-modal").html(data);
        }
    });
}

// ENVIAMOS LA PETICION PARA EL REGISTRO EN LA BASE DE DATOS
function consultarTelefonoBD(){
    var pagina = $("#frmConsulta").serialize();
    var url = "controladorbd.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=1",
        cache: false,
        success: function(data){
            $("#content-modal").html(data);
        }
    });
}

function guardarNumero(){
    var pagina = $("#frmRegistro").serialize();
    var url = "registro.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina,
        cache: false,
        success: function(data){
            $("#content-modal").html(data);
        }
    });
}

// ENVIAMOS LA PETICION PARA GUARDAR EL NUMERO EN LA BD
function guardarNumeroBD(){
    var pagina = $("#frmRegistro").serialize();
    var url = "controladorbd.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=2",
        cache: false,
        success: function(data){
            $("#content-modal").html(data);
        }
    });
}


function eliminarNumero(noTelefono){
    var r = confirm("¿Está seguro de eliminar el número?");
    if( r ){
        parent.location.href = "admon.php?noTelefono="+noTelefono;
    }
}

function eliminarNumeroBD(noTelefono){
    var r = confirm("¿Está seguro de eliminar el número?");
    if( r ){
        var url = "controladorbd.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "opc=5&noTelefono="+noTelefono,
            cache: false,
            success: function(data){
                $("#tbNumeros").load("controladorbd.php",{opc:'3'});
            }
        });
    }
}

function verEdicion(noTelefono,remitente){
    $("#myModal2").modal("show");
    $("#noTelefonoUp").val(noTelefono);
    $("#txtRemitenteUp").val(remitente);
}

function verEdicionBD(noTelefono,remitente){
    $("#myModal2").modal("show");
    $("#noTelefonoUp").val(noTelefono);
    $("#txtRemitenteUp").val(remitente);
}
