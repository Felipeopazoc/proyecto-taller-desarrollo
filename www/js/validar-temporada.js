
$(document).ready(function(){
    $("#mensaje5").hide();
    $("#mensaje6").hide();
    $("#form").change(function(){
        let data = $("#form").serialize();

        $.ajax({
            url: "crud-camping/validar_meses.php",
            type:"POST",
            async:true,
            data:data,
            success: function(response){
                if(response!=1){
                    //Mensaje de alerta
                    $("#button").attr("disabled",true);
                    $("#mensaje5").text("No puede elegir el mismo mes");
                    $("#mensaje6").text("No puede elegir el mismo mes");
                    $("#mensaje5").addClass("alerta-error");
                    $("#mensaje6").addClass("alerta-error");
                    $("#mensaje5").show();
                    $("#mensaje6").show();

                }else{
                    //Todo OK
                    $("#button").attr("disabled",false);
                    $("#mensaje5").hide();
                    $("#mensaje6").hide();
                }
            },
            error: function(error){
                console.log(error);
            }
        });

    });
    
});