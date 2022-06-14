$(document).ready(function(){
    $("#mensaje4").hide();
    $("#email").keyup(function(e){
        let data = $("#form").serialize();
      
        $.ajax({
            type:"POST",
            url: "crud-camping/validaCorreo.php",
            async:true,
            data: data,
            success: function(response){
                
                if(response.length>6){
                    let data = JSON.parse(response);
                  
                    if(e.target.value==data.correo && e.target.value!=""){
                     
                       
                        $("#mensaje4").show();
                        $("#mensaje4").text("Este correo ya está registrado");
                        //Bloqueamos los demas inputs
                        $("#button").attr("disabled",true);
                        $("#mensaje4").removeClass("alerta-disponible");
                        $("#mensaje4").addClass("alerta-error");
                    }
                }else{

                    $("#mensaje4").show();
                    $("#mensaje4").text("Este correo está disponible");
                    $("#mensaje4").removeClass("invalid-feedback");
                    $("#mensaje4").addClass("alerta-disponible");
                    $("#button").attr("disabled",false);
                   
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

});