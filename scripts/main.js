// JavaScript Document
$(document).ready(function ($) {			
	
	// Highlights the current menu page.
	$('.menu a').each(function(index) {
        if(this.href.trim() == window.location)
            $(this).css("color", "#EDE7BE");
    });
	
	// Toggle to show and hide the hamburger menu in mobile.
	$(".burgerBtn").click(function(){
        $(".mobileNav").toggle();
    });		
});
