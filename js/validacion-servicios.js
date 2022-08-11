$(document).ready(()=>{
    $("#boton").prop("disabled",true);
    
    let div = document.getElementById("formulario");
    let formulario = document.createElement("form");    
    formulario.setAttribute("id","form_servicios");
    formulario.setAttribute("action","crud-servicios/recibe.php");
    formulario.setAttribute("method","POST");

    formulario.className="w-75 m-auto row";
    div.className="w-100";
    div.appendChild(formulario);


    $("#form").change((e)=>{
        formulario.innerHTML="";
  //      let h1 = document.createElement("h1");
  //      h1.innerText = "Registro de servicios";
   //     h1.className = "text-center"
   //     formulario.appendChild(h1);
        let checkboxs = document.querySelectorAll('input[type="checkbox"]');
        let checkeds = [];
        let ids_servicios = [];
        let nombre_servicios = [];
       
        let boton_enviar = document.createElement("button");
        boton_enviar.setAttribute("id","boton");
    
        let valor_id_camping = document.getElementById("id_camping").value;
        console.log(valor_id_camping);

        let input_id_camping  = document.createElement("input");
        input_id_camping.setAttribute("type","hidden");
        input_id_camping.setAttribute("value",valor_id_camping);
        input_id_camping.setAttribute("name","id_camping");

        formulario.append(input_id_camping);
        boton_enviar.innerText="Enviar datos";

        boton_enviar.setAttribute("type","submit");

        checkboxs.forEach((checkbox)=>{
            if(checkbox.checked){
                checkeds.push(checkbox);
                
            }
        })
        if(checkeds.length == 0){
            $("#boton").prop("disabled",true);
        }else{
            $("#boton").prop("disabled",false);

        }
        let contador = 0;
        checkeds.map((checked)=> {
            let label = document.createElement("label");
            let input = document.createElement("input");//CREAMOS LOS INPUTS
            let caja_input = document.createElement("div");
            let input_precio = document.createElement("input");
            let caja_price = document.createElement("div");
            let label_price = document.createElement("label");
          
            //INPUT TYPE HIDDEN
            let input_hidden = document.createElement("input");
            input_hidden.setAttribute("name","ids[]");
            input_hidden.setAttribute("type","hidden");

            label_price.innerText="Precio";

            caja_input.className="col-6";
            caja_price.className="col-6";

            input.setAttribute("type","text");
            input.setAttribute("name","");
            input.setAttribute("disabled","");
            input.setAttribute("class","form-control");

            input_precio.setAttribute("class","form-control");
            input_precio.setAttribute("type","number");
            input_precio.setAttribute("name","prices[]");
            input_precio.setAttribute("required","");
            //formulario.appendChild(input);
            //formulario.appendChild(label);
            formulario.appendChild(caja_input);
            formulario.appendChild(caja_price);
            formulario.append(input_hidden);
            

            caja_input.appendChild(label);
            caja_input.appendChild(input);

            caja_price.appendChild(label_price);
            caja_price.appendChild(input_precio);
            input.setAttribute("name","precios[]");
            ids_servicios.push(checked.value);

            $.ajax({
                url: "./js/servicios.php",
                type: "POST",
                async : true,
                data: "id_servicio="+checked.value,
                success: function(response){
                    if(response!="error"){
                        let data = JSON.parse(response);
                       // console.log("ID="+checked.value+" Nombre="+data.nombre_servicio);
                       label.innerText="Nombre servicio";
                       console.log(data);
                       input.setAttribute("value",data.nombre_servicio);
                       input_hidden.setAttribute("value",data.id_servicio);
                       input.setAttribute("id",contador);
                        
                    }
                } 
            });
            contador++;
          

        });
        boton_enviar.className = "mt-4 btn btn-primary";
        formulario.appendChild(boton_enviar);
        
      
    });

}); 