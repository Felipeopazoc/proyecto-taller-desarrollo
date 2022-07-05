$(document).ready(()=>{
  
    $("#form").hide();
  
    
    $("#servicio1").hide();
    $("#precio1").hide();
    $("#servicio2").hide();
    $("#precio2").hide();
    $("#servicio3").hide();
    $("#precio3").hide();
    $("#servicio4").hide();
    $("#precio4").hide();
    $("#servicio5").hide();
    $("#precio5").hide();

     if(!$("#select1").is(":checked") && !$("#select2").is(":checked") && !$("#select3").is(":checked") && !$("#select4").is(":checked") && !$("#select5").is(":checked")){
         $("#boton").hide();
     }

    //Valores de los ID
    /*
    let id1 = $("#id1").val();
    let id2 = $("#id2").val();
    let id3 = $("#id3").val();
    let id4 = $("#id4").val();
    let id5 = $("#id5").val();
    */
    //Ocultamos los id

    $("#id1").removeAttr("name");
    $("#id2").removeAttr("name");
    $("#id3").removeAttr("name");
    $("#id4").removeAttr("name");
    $("#id5").removeAttr("name");
    
    //Ocultamos el name de cada input por defecto

    $("#price1").removeAttr("name");
    $("#price2").removeAttr("name");
    $("#price3").removeAttr("name");
    $("#price4").removeAttr("name");
    $("#price5").removeAttr("name");

    
    $('#select1').on('change', function() {
        if ($(this).is(':checked') ) {
            $("#servicio1").show();
            $("#precio1").show(); 
            $("#form").show();
            let valor = $(this).val();
            $("#title").show();
            $("#boton").show();
            
            $("#id1").attr("name","id1");
            $("#price1").attr("name","price1");
            $("#title").text("Servicios seleccionados");
            $.ajax({
                url : "comprobar.php",
                type: "POST",
                async: true,
                data: "valor="+valor,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                        console.log(data.nombre_servicio);
                        $("#name1").val(data.nombre_servicio); 
                        $("#name1").attr("disabled",true);
                    }
                } 
            });
          
        } else {
            $("#servicio1").hide();
            $("#precio1").hide();
      
            // $("#title").hide();
            // console.log("Deseleccionado");
            
            $("#id1").removeAttr("name");
            $("#price1").removeAttr("name");
        }
    });
    

    //SELECT 2
    $('#select2').on('change', function() {
        if ($(this).is(':checked') ) {
            $("#servicio2").show();
            $("#precio2").show(); 
            $("#form").show();
            let valor = $(this).val();
            $("#title").show();
            $("#boton").show();
            $("#id2").attr("name","id2");
            $("#price2").attr("name","price2");
            $("#title").text("Servicios seleccionados");
            $.ajax({
                url : "comprobar.php",
                type: "POST",
                async: true,
                data: "valor="+valor,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                        console.log(data.nombre_servicio);
                        $("#name2").val(data.nombre_servicio); 
                        $("#name2").attr("disabled",true);
                    }
                } 
            });
          
        } else {
            $("#servicio2").hide();
            $("#precio2").hide();
            
         
           $("#id2").removeAttr("name");
           $("#price2").removeAttr("name");
        }
    });

    //SELECT 3
    $('#select3').on('change', function() {
        if ($(this).is(':checked') ) {
            $("#servicio3").show();
            $("#precio3").show(); 
            $("#form").show();
            let valor = $(this).val();
            $("#boton").show();
            $("#title").show();
            $("#id3").attr("name","id3");
            $("#price3").attr("name","price3");
            $("#title").text("Servicios seleccionados");
            $.ajax({
                url : "comprobar.php",
                type: "POST",
                async: true,
                data: "valor="+valor,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                        console.log(data.nombre_servicio);
                        $("#name3").val(data.nombre_servicio); 
                        $("#name3").attr("disabled",true);
                    }
                } 
            });
          
        } else {
            $("#servicio3").hide();
            $("#precio3").hide();
          
            $("#id3").removeAttr("name");
            $("#price3").removeAttr("name");
        
        }
    });

    $('#select4').on('change', function() {
        if ($(this).is(':checked') ) {
            $("#servicio4").show();
            $("#precio4").show(); 
            $("#form").show();
            let valor = $(this).val();
            $("#title").text("Servicios seleccionados");
            $("#boton").show();
            $("#title").show();
            $("#id4").attr("name","id4");
            $("#price4").attr("name","price4");

            $.ajax({
                url : "comprobar.php",
                type: "POST",
                async: true,
                data: "valor="+valor,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                        console.log(data.nombre_servicio);
                        $("#name4").val(data.nombre_servicio); 
                        $("#name4").attr("disabled",true);
                    }
                } 
            });
          
        } else {
            $("#servicio4").hide();
            $("#precio4").hide();
          

           $("#id4").removeAttr("name");
           $("#price4").removeAttr("name");
         
        }
    });

    $('#select5').on('change', function() {
        if ($(this).is(':checked') ) {
            $("#servicio5").show();
            $("#precio5").show(); 
            $("#form").show();
            let valor = $(this).val();
            $("#title").show();
            $("#title").text("Servicios seleccionados");
            $("#boton").show();
            $("#id5").attr("name","id5");
            $("#price5").attr("name","price5");
            $.ajax({
                url : "comprobar.php",
                type: "POST",
                async: true,
                data: "valor="+valor,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                        console.log(data.nombre_servicio);
                        $("#name5").val(data.nombre_servicio); 
                        $("#name5").attr("disabled",true);
                    }
                } 
            });
          
        } else {
            $("#servicio5").hide();
            $("#precio5").hide();
        
            $("#id5").removeAttr("name");
            $("#price5").removeAttr("name");
        }
    });
    
});