/*$(document).ready(()=>{ 
   $("#buscador").click((e)=>{
        e.preventDefault();
    
       
            let data = $("#form").serialize();
            $.ajax({
                url: "js/buscar.php",
                type: "POST",
                async: true,
                data: data,
                success: function(response){
                    //console.log(response.trim());
                    response = response.trim();
                    if(response != "error"){
                        let data = JSON.parse(response);
                        let campings = document.getElementById("campings");
                        console.log(campings);
                      
                        data.forEach(element => {
                            console.log(element);
                        });
                    }else{
                        console.log("No encontró nada");
                        
                    }
                }
            })
        

   });
});
*/