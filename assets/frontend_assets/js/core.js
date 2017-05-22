
$(function() {
    $(window).scroll( function(){
    
       
        $('.fadeInBlock').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* Adjust the "200" to either have a delay or that the content starts fading a bit before you reach it  */
            bottom_of_window = bottom_of_window + 200;  
          
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
        }); 
    
    });

$(".box-blog").slice(0, 8).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".box-blog:hidden").slice(0, 8).slideDown();
        if ($(".box-blog:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
    


$(".dropdown-toggle").hover(function(){
  $('#toogle-menu').addClass( "open" );
  $(".dropdown-toggle").attr("aria-expanded","true");
});

$(".dropdown-menu").mouseleave(function(){
    $('#toogle-menu').removeClass( "open" );
    $(".dropdown-toggle").attr("aria-expanded","false");
})

});

$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
                var goto = $('#goto_value').val();
                if(goto == 'form')
                {
                    var offset = -70; //Offset of 20px

                    $('html, body').animate({
                        scrollTop: $("#become-partner").offset().top + offset
                    }, 2000);
                }
});

$("#goto-section-unique").click(function() {
    var offset = -70; //Offset of 20px

    $('html, body').animate({
        scrollTop: $("#unique").offset().top + offset
    }, 2000);
});