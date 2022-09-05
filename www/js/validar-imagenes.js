
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
    $("#input_imagen2").change(()=>{
        let valor = document.getElementById("input_imagen2").value;
       // console.log(valor.value);
       $("#boton2").prop("disabled",true);
        $("#mensaje2").text("Por favor suba imágenes png , jpg");
        $("#mensaje2").removeClass("alert alert-warning")
        $("#mensaje2").addClass("alert alert-danger")
       if(valor.includes("png") || valor.includes("jpg")){
           $("#boton2").prop("disabled",false);
           $("#mensaje2").text("Imagen cargada correctamente");
           $("#mensaje2").removeClass("alert alert-danger")
           $("#mensaje2").addClass("alert alert-primary")
       }else{
           $("#boton2").prop("disabled",true);
           $("#mensaje2").text("Por favor suba imágenes png , jpg");
       }
    });
 
});