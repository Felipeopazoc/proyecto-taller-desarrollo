
$(document).ready(()=>{
    
    $("#input_imagen").change(()=>{
        let valor = document.getElementById("input_imagen").value;
       // console.log(valor.value);
       $("#boton").prop("disabled",true);
       if(valor.includes("png") || valor.includes("jpg")){
           $("#boton").prop("disabled",false);
       }else{
           $("#boton").prop("disabled",true);
       }
    });
    /*
    $("#form_imagen").change(()=>{
        let valor_input = document.getElementById("input_imagen");
        let string_input = valor_input.value;
        console.log(string_input);
        $("#boton").prop("disabled",false);
        if(string_input.includes("png") || string_input.includes("jpg")){
            $("#boton").prop("disabled",false);
        }else{
            $("#boton").prop("disabled",true);
        }


    });
    */
});