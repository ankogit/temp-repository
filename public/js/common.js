$(function() {

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	//$(".reward img").animated("fadeInLeft", "fadeOutDown");
	//$(".info_box").animated("zoomIn", "fadeOutDown");

	//$(".item").animated("zoomIn", "fadeOutDown");

	$('.item').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('zoomIn').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.whywel').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('fadeInLeft').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});
	
	$('.whywem').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('fadeInUp').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.whywer').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('fadeInRight').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.inDown').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('bounceInDown').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.inUp').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('bounceInUp').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.inLeft').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.inRight').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '90%'
				});

	$('.tree').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('zoomInRight').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '98%'
				});
	
	$('.noTree').css("opacity", "0").addClass("animated").waypoint(function(direction) {
						
								$(this).addClass('zoomInRight').css("opacity", "1").css("animation-fill-mode","none");
						
				}, {
						offset: '98%'
				});



	
	
	$("p").animated("fadeInUp", "fadeOutDown");
	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	/*$("form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});*/

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
});




/* window.onscroll = function() {
		var scrolled = window.pageYOffset || document.documentElement.scrollTop;
		if (scrolled<750) {
			var scrolled_style= scrolled/1.5;
			$('.top-baner').css("height","calc(550px - "+scrolled_style+"px)");
		}
} */ //параллакс



$(window).on("load", function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");


		//masonry
	    var $container = $(".masonry-container");
	    $container.imagesLoaded(function () {
	        $container.masonry({
	            columnWidth: ".item",
	            itemSelector: ".item"
	        });
	        $(".item").imagefill();
	    });
	    $(".item").imagefill();
});

