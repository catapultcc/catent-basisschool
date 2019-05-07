// JavaScript Document

jQuery(document).ready(function(){
    
    //FANCYBOX
	jQuery('.team-klik, .team-klik2').fancybox({
        infobar:true,
		controls : true,
		showinfo : true,
        closeBtn: 0
	});	
    
	// TEAM POPUP
    jQuery(".team-img").click(function() {
		jQuery(".menu-overlay").toggleClass("open");
		jQuery(".menu").toggleClass("open");
	});

	// HAMBURGER MENU
    jQuery(".menu-link").click(function() {
		jQuery(".menu-overlay").toggleClass("open");
		jQuery(".menu").toggleClass("open");
	});
	
    // HAMBURGER MENU button
	jQuery("#uitklapper").click(function() {
		jQuery("ul.hoofdmenu").toggle();
	});
	
	  // HAMBURGER MENU li
	jQuery("ul.hoofdmenu li").click(function() {
		jQuery("ul.hoofdmenu").toggle();
	});
	
	  // HAMBURGER MENU a
	jQuery("ul.hoofdmenu li a").click(function() {
		jQuery("ul.hoofdmenu").toggle();
	});
	
	// PRELOADER
	setTimeout(function() {
		jQuery('#preloader').fadeOut('slow',function(){
		  jQuery(this).remove();
		});
	}, 800);
    
	// HAMBURGER MENU
    jQuery('.navbar-nav>li>a').on('click', function(){
        jQuery('.navbar-collapse').collapse('hide');
    });
	
	// hoogte gelijk aan breedte blokken
	var bm3 =(jQuery('.vierkant-wrapper').width());
	jQuery('.vierkant-box').css({'height':bm3+'px'});
    
    // Veranderen van icoon bij openklappen toekomstvisie
    jQuery(".btn-link").click(function() {
        if(jQuery(this).attr('aria-expanded') === "false") {
            jQuery(this).removeClass('minus');
            jQuery(this).addClass("minus");
        } else {
            jQuery(this).removeClass('minus');
        }
    });
	
	// OWL SLIDER ONZE OUDERS
	jQuery("#ouders-slider").owlCarousel({ 
        margin: 0,
        loop: true,
        autoWidth: false,
        singleItem: true,
        items: 1,
        nav: false,
        dots: true,
        autoplay: true,
        smartSpeed: 500,
    });
    
    // OWL SLIDER VISIE
	jQuery("#visie-slider").owlCarousel({ 
        margin: 0,
        loop: true,
        autoWidth: false,
        singleItem: true,
        items: 1,
        nav: false,
        dots: false,
        autoplay: true,
        smartSpeed: 500,
       	responsiveClass:true,
    	responsive:{
			0:{
				items: 1,
			},
			768:{
				items: 2,
			},
			992:{
				items: 4,
			}
    	}
    });
	
});


jQuery( window ).resize(function() {
	// hoogte gelijk aan breedte blokken
	var bm3 =(jQuery('.vierkant-wrapper').width());
	jQuery('.vierkant-box').css({'height':bm3+'px'});
});



//scroll to Top
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,
	//grab the "back to top" link
	$back_to_top = $('.cd-top');
	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});


