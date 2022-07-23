$(document).ready(function(){


            let id_camping = $("#id_camping").val();
            console.log(id_camping);

            let data1 = $("#id1").val();
            let data2 = $("#id2").val();
            let data3 = $("#id3").val();
            let data4 = $("#id4").val();
            let data5 = $("#id5").val();

            $.ajax({
                url:"crud-servicios/validar_servicio.php",
                type:"POST",
                async: true,
                data: "id1="+data1+"&id_camping="+id_camping,
                success: function(response){
                    if(response.length>8){
                        let objetoServicio = JSON.parse(response);
                        if(objetoServicio.id_servicio==data1){
                            $("#select1").prop('checked',true);
                            $("#select1").prop('disabled',true);
                            console.log(objetoServicio.id_servicio);
                           
                        }
                    }
                }
            });
            $.ajax({
                url:"crud-servicios/validar_servicio.php",
                type:"POST",
                async: true,
                data: "id1="+data2+"&id_camping="+id_camping,
                success: function(response){
                    if(response.length>8){
                        let objetoServicio = JSON.parse(response);
                        if(objetoServicio.id_servicio==data2){
                            $("#select2").prop('checked',true);
                            $("#select2").prop('disabled',true);
                            console.log(objetoServicio.id_servicio);
                            
                        }
                    }
                }
            });
            $.ajax({
                url:"crud-servicios/validar_servicio.php",
                type:"POST",
                async: true,
                data: "id1="+data3+"&id_camping="+id_camping,
                success: function(response){
                    if(response.length>8){
                        let objetoServicio = JSON.parse(response);
                        if(objetoServicio.id_servicio==data3){
            
                            $("#select3").prop('checked',true);
                            $("#select3").prop('disabled',true);
                            console.log(objetoServicio.id_servicio);
                           
                        }
                    }
                }
            });
            $.ajax({
                url:"crud-servicios/validar_servicio.php",
                type:"POST",
                async: true,
                data: "id1="+data4+"&id_camping="+id_camping,
                success: function(response){
                    if(response.length>8){
                        let objetoServicio = JSON.parse(response);
                        if(objetoServicio.id_servicio==data4){
                            
                            $("#select4").prop('checked',true);
                            $("#select4").prop('disabled',true);
                            console.log(objetoServicio.id_servicio);
                           
                        }
                    }
                }
            });
            $.ajax({
                url:"crud-servicios/validar_servicio.php",
                type:"POST",
                async: true,
                data: "id1="+data5+"&id_camping="+id_camping,
                success: function(response){
                    if(response.length>8){
                        let objetoServicio = JSON.parse(response);
                        if(objetoServicio.id_servicio==data5){
                          //  $("#contenedor5").hide();
                             $("#select5").prop('checked',true);
                             $("#select5").prop('disabled',true);
                            console.log(objetoServicio.id_servicio);
                            
                        }
                    }
                }
            });

           
           
    

});