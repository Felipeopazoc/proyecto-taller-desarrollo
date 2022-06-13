$(document).ready(function(){
    $("#email").keyup(function(e){
        let data = $("#form").serialize();
      
        $.ajax({
            type:"POST",
            url: "crud-camping/validaCorreo.php",
            async:true,
            data: data,
            success: function(response){
                
                if(response.length>6){
                    let data = JSON.parse(response);
                    console.log("Ocupado");
                }else{
                    console.log("Disponible");
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

});