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

