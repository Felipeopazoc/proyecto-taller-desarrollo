$(document).ready(()=>{
    $("#form").change(()=>{
        let comuna = $("#comuna").val();
        let servicio = $("#servicio").val();
        let estado = $("#estado").val();

        if(comuna.length == 0 && servicio.length == 0 && estado.length == 0){
            $("#mensaje_alerta").text("Ingrese al menos un parámetro");
            $("#mensaje_alerta").addClass("alert alert-danger w-75 m-auto text-center mt-2");
            $("#buscador").prop("disabled",true);
        }else{
            $("#mensaje_alerta").removeClass("alert alert-danger");
            $("#mensaje_alerta").addClass("alert alert-success");
            $("#mensaje_alerta").text("Ha seleccionado parámetros");
            $("#buscador").prop("disabled",false);
        }
    });
});