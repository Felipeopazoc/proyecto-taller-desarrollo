$(document).ready(function(){
    $("#mensaje3").hide();
   ;
    $("#telefono").keyup(function(e){
        let valor = e.target.value;
        console.log(valor.length);
        if(valor.length >= 0 && valor.length < 9 ){
            $("#mensaje3").text("Formato incorrecto");
            $("#button").prop("disabled",true);
            $("#mensaje3").removeClass("alerta-disponible");
            $("#mensaje3").addClass("invalid-feedback");
            $("#mensaje3").show();
        }else if(valor.length==9){

           $("#mensaje3").text("Formato correcto");
            $("#button").prop("disabled",false);
            $("#mensaje3").removeClass("invalid-feedback");
            $("#mensaje3").addClass("alerta-disponible");
            $("#mensaje3").show();
            
            
        }else{
            $("#mensaje3").text("Formato incorrecto");
            $("#button").prop("disabled",true);
            $("#mensaje3").removeClass("alerta-disponible");
            $("#mensaje3").show();
            $("#mensaje3").addClass("invalid-feedback");
        }
        
    });
});