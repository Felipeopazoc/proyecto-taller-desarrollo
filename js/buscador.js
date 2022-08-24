$(document).ready(()=>{

//$("#form").change(()=>{
    $("#nombre").keyup((e)=>{
        let nombre = e.target.value;
    
        if(nombre.length == 0){
            console.log("No ha escrito nada");
        }
        
     });
     $("#comuna").change((e)=>{
        console.log (e.target.value); 
     });
     $("#estado").change((e)=>{
        console.log (e.target.value); 
     });

    });
   
//});