$(document).ready(function(){
    $("#mensaje2").hide();
    $("#direccion").keyup(function(e){
        let data = $("#form").serialize();
        $.ajax({
            url: "crud-camping/validarDireccion.php",
            type: "POST",
            async: true,
            data: data,
            success: function(response){
                if(response.length>8){
                    let data = JSON.parse(response);
                    
                    if(data.direccion == e.target.value){
                        $("#mensaj2").show();
                        $("#mensaje2").text("Esta dirección ya está registrada");
                        //Bloqueamos los demas inputs
                        $("#button").attr("disabled",true);
                        $("#mensaje2").removeClass("alerta-disponible");
                        $("#mensaje2").addClass("alerta-error");
                    }
                }else{
                        $("#mensaje2").show();
                        $("#mensaje2").text("Dirección disponible");
                        $("#mensaje2").removeClass("invalid-feedback");
                        $("#mensaje2").addClass("alerta-disponible");

                        $("#button").attr("disabled",false);
                }
            },
            error:function(error){
                console.log(error);
            } 
        });
    });
});