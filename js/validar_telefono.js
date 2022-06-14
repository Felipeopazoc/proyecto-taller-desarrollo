$(document).ready(function(){
    $("#mensaje3").hide();
    let n=9;
    $("#telefono").keyup(function(e){
        let valor = e.target.value;
        console.log(valor.length);
       
        if(valor.length==9){
         
            $("#mensaje3").text("Cumple con el formato");
            $("#button").attr("disabled",true);
            $("#mensaje3").removeClass("invalid-feeback");
            $("#mensaje3").addClass("alerta-disponible");
            $("#mensaje3").show();
        }else{
            $("#mensaje3").show();
            n--;
            if(n>0){
                $("#mensaje3").text("Te faltan "+(n)+" números");
            }
        
            $("#mensaje3").removeClass("invalid-feedback");
            $("#mensaje3").addClass("alerta-error");
            
            $("#button").attr("disabled",false);
        }
    });
});