
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
                    $("#mensaje5").text("Rango correcto Octubre a marzo o Enero a marzo");
                    $("#mensaje6").text("Rango correcto Octubre a marzo o Enero a marzo");
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