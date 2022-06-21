
$(document).ready(function(){
    let contador=0;
    /*
    $("#name").keyup(function(e){
        let nombre=e.target.value;
        if(nombre.length>0){
            contador++; 
        }else{
            $("#button").attr("disabled",true);
        }
    });
    $("#sitios").keyup(function(e){
        let sitios = e.target.value;
        if(sitios.length>0){
            console.log("Hay algo");
            contador++;
        }else{
            $("#button").attr("disabled",true);
        }
        console.log(contador);
    });
    */
   
    $("#button").click(function(e){
        //Obtener todos los campos
        e.preventDefault();
        let nombre = $("#name").val();
        let sitios = $("#sitios").val();
        let direccion = $("#direccion").val();
        let telefono = $("#telefono").val();              
        let correo = $("#email").val();
        let comuna = $("#comuna").val();
        let inicioTemporada = $("#inicio").val();
        let finTemporada = $("#fin").val();
        let descripcion = $("#descripcion").val();

        if(nombre.length>0 && sitios.length>0 && direccion.length>0 && telefono.length>0 && correo.length>0 && comuna>0 && inicioTemporada.length>0 && finTemporada.length>0 
            && descripcion.length>0){
            let data = $("#form").serialize();
            $.ajax({
                type: "POST",
                url: "crud-camping/insert.php",
                data: data,
                async: true,
                success: function (response) {
                    if(response){
                        swal("Excelente", "Los datos han sido ingresados", "success");
                        setTimeout(()=>{
                          
                            location.href="listadoImagenes.php?id="+response;
                        },2500);
                        
                    }
                }
            });
        }else{
            console.log("faltan algunos");
            swal("Ha ocurrido un error", "No está completo el formulario", "error");
        }
    });
});
