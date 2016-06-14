$(document).ready(function(){
    $(".tab").click(function(){
        $(".container").hide("fast");
        	$(".tabular").show();
        });
 
    });


    $(document).ready(function(){
    $(".grid").click(function(){
        $(".tabular").hide("fast");
        	$(".container").show();
        	});
});

        $(document).ready(function(){
    $(".register").click(function(){
        $(".login_form, .register").hide();
            $(".signup_form").show();
            });
});




