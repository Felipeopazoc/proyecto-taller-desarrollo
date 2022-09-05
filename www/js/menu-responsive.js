$(document).ready(function(){   
    $("#header2").show();
    $("#header").hide();
    
    $(window).resize(function(){     

        if ($('header').width() < 769 ){
            $("#header").show();
            $("#header2").hide();
        }else if($('header').width() >= 769){
            $("#header").hide();
            $("#header2").show();
        }

    });
    
});

