$(document).ready(()=>{

    
        let checkeds = document.querySelectorAll("input[type='checkbox']");
        let hidden = document.querySelectorAll("input[type='hidden']");
        //console.log(hidden[0].value);
        checkeds.forEach(Element=>{
            $.ajax({
                url:"js/servicio.php",
                type: "POST",
                async: true,
                data: "id_servicio="+Element.value+"&id_camping="+hidden[0].value,
                success: function(response){
                    response = response.trim();
                    if(response!="error"){
                        let data = JSON.parse(response);
                        if(data.id_servicio == Element.value){
                           
                            Element.setAttribute("disabled",true);
                        }
                    }
                    
                }
            })
        });
    
   

});