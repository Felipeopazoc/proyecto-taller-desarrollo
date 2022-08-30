
$(document).ready(()=>{
    
    $("#input_imagen").change(()=>{
        let valor = document.getElementById("input_imagen").value;
       // console.log(valor.value);
       $("#boton").prop("disabled",true);
        $("#mensaje").text("Por favor suba imágenes png , jpg");
        $("#mensaje").removeClass("alert alert-warning")
        $("#mensaje").addClass("alert alert-danger")
       if(valor.includes("png") || valor.includes("jpg")){
           $("#boton").prop("disabled",false);
           $("#mensaje").text("Imagen cargada correctamente");
           $("#mensaje").removeClass("alert alert-danger")
           $("#mensaje").addClass("alert alert-primary")
       }else{
           $("#boton").prop("disabled",true);
           $("#mensaje").text("Por favor suba imágenes png , jpg");
       }
    });
 
});