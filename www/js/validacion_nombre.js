$(document).ready(function(){
    $("#mensaje").hide();
    $("#name").keyup(function(e){
      //  console.log(e.target.value);
       // let data = $("#form").serialize();
       let nombre = e.target.value;
       let nombre_sanitizado = nombre.trim();
        nombre_sanitizado = nombre_sanitizado.toUpperCase();
        console.log(nombre_sanitizado);
        $.ajax({
            url: "crud-camping/validarNombre.php",
            type: "POST",
            async: true,
            data: "nombre="+nombre_sanitizado,
            success: function(response){
               
               // console.log("respuesta:"+response.length);
                if(response.length>6){
                    let data = JSON.parse(response);
                    let nombre = data.nombre;
                    nombre = nombre.toUpperCase();
                    let valor = e.target.value;
                    let valor_sanitizado = valor.trim();
                    valor_sanitizado = valor_sanitizado.toUpperCase();  
                    console.log(nombre.includes(valor_sanitizado));
                   
                    if(nombre.includes(valor_sanitizado)){
                        $("#mensaje").show();
                        $("#mensaje").text("Este nombre ya está registrado");
                        //Bloqueamos los demas inputs
                        $("#button").attr("disabled",true);
                        $("#mensaje").removeClass("alerta-disponible");
                        $("#mensaje").addClass("alerta-error");
                    }
                }else{
                    /*
                        $("#mensaje").show();
                        $("#mensaje").text("Nombre disponible");
                        $("#mensaje").removeClass("invalid-feedback");
                        $("#mensaje").addClass("alerta-disponible");

                        $("#button").attr("disabled",false);
                        */
                       $("#mensaje").hide();

                }
            },  
            error: function(error){
                console.log(error);
            }
        });
        
    });

});