// JavaScript Document
$(document).ready(function ($) {
	
	// Hide all slideshow images.
	$('#gGlry').children().hide();
	$('#wGlry').children().hide();
	
	// Create arrays to hold the images.
	var images = new Array();
	var slides = new Array();	
	
	// Function to automatically play the Graphic design Gallery slideshow.
	function gMoveRight(slideUL) {
		var timer = setInterval(function () {
			slideUL.fadeOut(1000, function () {
					$('#gGlry li:first-child').appendTo(slideUL);
					$('#gGlry li:last-child').hide();
					$('#gGlry li:first-child').show();				
					slideUL.fadeIn(1000);
			});
		}, 3000);
		
		// Pause the slideshow when hovering ovr an image.
		slideUL.hover(function () {
    			clearInterval(timer);
			}, function () {
    			gMoveRight(slideUL);
		});
		
		//Stop the slideshow when the slideshow is closed.
		$('.close').click(function(){	
			clearInterval(timer);		
			images = [];
			slides = [];
		});
    };
	
	// Function to automatically play the Web design Gallery slideshow.
	function wMoveRight(slideUL) {
		var timer = setInterval(function () {
			slideUL.fadeOut(1000, function () {
					$('#wGlry li:first-child').appendTo(slideUL);
					$('#wGlry li:last-child').hide();
					$('#wGlry li:first-child').show();				
					slideUL.fadeIn(1000);
			});
		}, 3000);
		
		slideUL.hover(function () {
    			clearInterval(timer);
			}, function () {
    			wMoveRight(slideUL);
		});
		
		//Stop the slideshow when the slideshow is closed.
		$('.close').click(function(){
			clearInterval(timer);			
			images = [];
			slides = [];
		});
    };			 
	
	/*Finds all img type tags that are children
	  of the element object passed in, passes them
	  into the 'images' array, modifies them to
	  have an id of 'image#' and then passes them 
	  to a new array titled 'slides' which is
	  returned.*/
	function getImages(element) {		
		images = element.find('img');
		
		for (var i = 0; i < images.length; i++) {			
			var image = images[i];		
			image.id = "image" + (i + 1);														
			slides.push(image);		
		}		
		return slides;
	}		
	
	// Hide all of the slideshow images		
	$('#gGlry').hide();
	$('#wGlry').hide();
	$('#aGlry').hide();
	$('#vGlry').hide();
	
	// Assign left and right buttons for the slideshow to varaiables.
	var left = $('.prev');
	var right = $('.next');	
	
	// Close the slidehow overlay.
	$('.close').off().on('click', function () {
		$('#slideshow').css("display", "none");			
		$('#gGlry').hide();
		$('#wGlry').hide();	
		$('#aGlry').hide();
	    $('#vGlry').hide();
		// Make the hamburger menu button reappear if on mobile.
		if ($(window).width() < 600) {
			$(".burgerBtn").show();
		}
		$('#gGlry').children().hide();
		$('#wGlry').children().hide();
	});
	
	// Display the Graphic design slideshow on the slideshow overlay (Student Work page).
	$('#gBtn').off().on('click', function () {
		
		// Variables to hold jquery selectors.
		var slideShow = $('#slideshow');
		var slideUL = $('#gGlry');
		var slideULLI = $('#gGlry li');
		var image = $('#gGlry li img');					
		
		// Put images in an array and add IDs to them.
		var slides = new Array(); 
		slides = getImages(slideULLI);		
				
		// Make the gallery visible.
		slideShow.css("display", "block");		
		slideUL.show();
		$('#gGlry li:first-child').show();		
		
		// Hide the hamburger menu button.
		$(".burgerBtn").hide();					
		
		// Apply the max height or width to each image based on whether it is a tall or wide image.
		for(var i = 0; i < slides.length; i++) {
			if (slides[i].naturalHeight > slides[i].naturalWidth) {				
				$('#image' + (i+1)).css('max-height', slideUL.height());
				$('#image' + (i+1)).css('max-width', 'auto');				
			} else if (slides[i].naturalWidth > slides[i].naturalHeight){
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', 'auto');
			} else if (slides[i].naturalWidth === slides[i].naturalHeight) {
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', slideUL.height());
			}			
		}
		
		// Start slideshow autoplay feature.
		gMoveRight(slideUL);		
		
		//Move to the next slide in the slideshow when the button is clicked.
		left.off().on('click', function () {									
			slideUL.fadeOut(200, function () {
				$('#gGlry li:last-child').prependTo('#gGlry');
				$('#gGlry li:last-child').hide();
				$('#gGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});
		
		//Move to the previous slide in the slideshow when the button is clicked.
		right.off().on('click', function () {																
			slideUL.fadeOut(200, function () {
				$('#gGlry li:first-child').appendTo('#gGlry');
				$('#gGlry li:last-child').hide();				
				$('#gGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});		
				
	});
	
	// Display the Graphic design slideshow on the slideshow overlay (Main page).
	$('#gb').off().on('click', function () {
		
		// Variables to hold jquery selectors.
		var slideShow = $('#slideshow');
		var slideUL = $('#gGlry');
		var slideULLI = $('#gGlry li');
		var image = $('#gGlry li img');					
		
		// Put images in an array and add IDs to them.
		var slides = new Array(); 
		slides = getImages(slideULLI);		
				
		// Make the gallery visible.
		slideShow.css("display", "block");		
		slideUL.show();
		$('#gGlry li:first-child').show();		
		
		// Hide the hamburger menu button.
		$(".burgerBtn").hide();					
		
		// Apply the max height or width to each image based on whether it is a tall or wide image.
		for(var i = 0; i < slides.length; i++) {
			if (slides[i].naturalHeight > slides[i].naturalWidth) {				
				$('#image' + (i+1)).css('max-height', slideUL.height());
				$('#image' + (i+1)).css('max-width', 'auto');				
			} else if (slides[i].naturalWidth > slides[i].naturalHeight){
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', 'auto');
			} else if (slides[i].naturalWidth === slides[i].naturalHeight) {
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', slideUL.height());
			}			
		}
		
		// Start slideshow autoplay feature.
		gMoveRight(slideUL);		
		
		//Move to the next slide in the slideshow when the button is clicked.
		left.off().on('click', function () {									
			slideUL.fadeOut(200, function () {
				$('#gGlry li:last-child').prependTo('#gGlry');
				$('#gGlry li:last-child').hide();
				$('#gGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});
		
		//Move to the previous slide in the slideshow when the button is clicked.
		right.off().on('click', function () {																
			slideUL.fadeOut(200, function () {
				$('#gGlry li:first-child').appendTo('#gGlry');
				$('#gGlry li:last-child').hide();				
				$('#gGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});		
				
	});
	
	// Display the Website design slideshow on the slideshow overlay (Student Work page).
	$('#wBtn').off().on('click', function () {
		
		// Variables to hold jquery selectors.
		var slideShow = $('#slideshow');
		var slideUL = $('#wGlry');
		var slideULLI = $('#wGlry li');
		var image = $('#wGlry li img');					
		
		// Put images in an array and add IDs to them.
		var slides = new Array(); 
		slides = getImages(slideULLI);		
				
		// Make the gallery visible.
		slideShow.css("display", "block");		
		slideUL.show();
		$('#wGlry li:first-child').show();		
		
		// Hide the hamburger menu button.
		$(".burgerBtn").hide();					
		
		// Apply the max height or width to each image based on whether it is a tall or wide image.
		for(var i = 0; i < slides.length; i++) {
			if (slides[i].naturalHeight > slides[i].naturalWidth) {				
				$('#image' + (i+1)).css('max-height', slideUL.height());
				$('#image' + (i+1)).css('max-width', 'auto');				
			} else if (slides[i].naturalWidth > slides[i].naturalHeight){
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', 'auto');
			} else if (slides[i].naturalWidth === slides[i].naturalHeight) {
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', slideUL.height());
			}			
		}
		
		// Start slideshow autoplay feature.
		wMoveRight(slideUL);		
		
		//Move to the next slide in the slideshow when the button is clicked.
		left.off().on('click', function () {									
			slideUL.fadeOut(200, function () {
				$('#wGlry li:last-child').prependTo('#wGlry');
				$('#wGlry li:last-child').hide();
				$('#wGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});
		
		//Move to the previous slide in the slideshow when the button is clicked.
		right.off().on('click', function () {																
			slideUL.fadeOut(200, function () {
				$('#wGlry li:first-child').appendTo('#wGlry');
				$('#wGlry li:last-child').hide();				
				$('#wGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});		
				
	});
	
	// Display the Website design slideshow on the slideshow overlay (Main page).
	$('#wb').off().on('click', function () {
		
		// Variables to hold jquery selectors.
		var slideShow = $('#slideshow');
		var slideUL = $('#wGlry');
		var slideULLI = $('#wGlry li');
		var image = $('#wGlry li img');					
		
		// Put images in an array and add IDs to them.
		var slides = new Array(); 
		slides = getImages(slideULLI);		
				
		// Make the gallery visible.
		slideShow.css("display", "block");		
		slideUL.show();
		$('#wGlry li:first-child').show();		
		
		// Hide the hamburger menu button.
		$(".burgerBtn").hide();					
		
		// Apply the max height or width to each image based on whether it is a tall or wide image.
		for(var i = 0; i < slides.length; i++) {
			if (slides[i].naturalHeight > slides[i].naturalWidth) {				
				$('#image' + (i+1)).css('max-height', slideUL.height());
				$('#image' + (i+1)).css('max-width', 'auto');				
			} else if (slides[i].naturalWidth > slides[i].naturalHeight){
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', 'auto');
			} else if (slides[i].naturalWidth === slides[i].naturalHeight) {
				$('#image' + (i+1)).css('max-width', slideUL.width());
				$('#image' + (i+1)).css('max-height', slideUL.height());
			}			
		}
		
		// Start slideshow autoplay feature.
		wMoveRight(slideUL);		
		
		//Move to the next slide in the slideshow when the button is clicked.
		left.off().on('click', function () {									
			slideUL.fadeOut(200, function () {
				$('#wGlry li:last-child').prependTo('#wGlry');
				$('#wGlry li:last-child').hide();
				$('#wGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});
		
		//Move to the previous slide in the slideshow when the button is clicked.
		right.off().on('click', function () {																
			slideUL.fadeOut(200, function () {
				$('#wGlry li:first-child').appendTo('#wGlry');
				$('#wGlry li:last-child').hide();				
				$('#wGlry li:first-child').show();								
				slideUL.fadeIn(200);
			});
		});		
				
	});
	
});