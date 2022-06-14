$(document).ready(function(){
    $("#mensaje").hide();
    $("#name").keyup(function(e){
      //  console.log(e.target.value);
        let data = $("#form").serialize();
        $.ajax({
            url: "crud-camping/validarNombre.php",
            type: "POST",
            async: true,
            data: data,
            success: function(response){
               
               // console.log("respuesta:"+response.length);
                if(response.length>6){
                 
                    let data = JSON.parse(response);
                    if(data.nombre == e.target.value && e.target.value!=""){
                        $("#mensaje").show();
                        $("#mensaje").text("Este nombre ya está registrado");
                        //Bloqueamos los demas inputs
                        $("#button").attr("disabled",true);
                        $("#mensaje").removeClass("alerta-disponible");
                        $("#mensaje").addClass("alerta-error");
                    }
                }else{
                        $("#mensaje").show();
                        $("#mensaje").text("Nombre disponible");
                        $("#mensaje").removeClass("invalid-feedback");
                        $("#mensaje").addClass("alerta-disponible");

                        $("#button").attr("disabled",false);

                }
            },  
            error: function(error){
                console.log(error);
            }
        });
        
    });

});