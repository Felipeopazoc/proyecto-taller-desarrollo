$(document).ready(function(){
    $("#mensaje3").hide();
    let n=9;
    $("#telefono").keyup(function(e){
        let valor = e.target.value;
        console.log(valor.length);
       
        if(valor.length==9){
            $("#mensaje3").show();
            $("#mensaje3").text("Cumple con el formato");
            $("#button").attr("disabled",true);
            $("#mensaje").removeClass("alerta-disponible");
            $("#mensaje").addClass("alerta-error");
        }else{
            $("#mensaje3").show();
            n--;
            if(n>0){
                $("#mensaje3").text("Te faltan "+(n)+" números");
            }
        
            $("#mensaje").removeClass("invalid-feedback");
            $("#mensaje").addClass("alerta-disponible");
            
            $("#button").attr("disabled",false);
        }
    });
});