$(document).ready(function(){
    $("#mensaje3").hide();
    let array = [0,1,2,3,4,5,6,7,8,9];
    let n=9;
    let resultado;
    $("#telefono").keyup(function(e){
        let valor = e.target.value;
        console.log(valor.length);
        
        if(valor.length==9){

           $("#mensaje3").text("Cumple con el formato");
            $("#button").attr("disabled",true);
            $("#mensaje3").removeClass("invalid-feeback");
            $("#mensaje3").addClass("alerta-disponible");
            $("#mensaje3").show();
            n=valor.length;
            
        }else{
            $("#mensaje3").show();
            
            resultado = n - valor.length;
            if(n>=0 && n<9){
                $("#mensaje3").text("Te faltan "+(resultado)+" números");
                $("#mensaje3").removeClass("invalid-feedback");
                $("#mensaje3").addClass("alerta-error");         
                $("#button").attr("disabled",false);
            
            }
        }
        
    });
});