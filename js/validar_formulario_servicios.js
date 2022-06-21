$(document).ready(function(){
    $("#btn").click(function(e){
        e.preventDefault();
        let data = document.getElementById("#name1").innerText;
        console.log(data);
    });
});