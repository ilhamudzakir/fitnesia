$(window).scroll(function() {
if ($(this).scrollTop() > 250){  
    $('nav').addClass("nabvar-white-fixed");
  }
  else{
    $('nav').removeClass("nabvar-white-fixed");
  }
});