jQuery(function($){
	//slick
	$('#js-slide').slick({
		autoplay: true,
		autoplay: false,
		dots: false,
		centerMode: true,
		variableWidth: true,
		prevArrow: '<span class="slide-arrow prev-arrow"><i class="fas fa-angle-double-left fa-2x"></i></span>',
		nextArrow: '<span class="slide-arrow next-arrow"><i class="fas fa-angle-double-right fa-2x"></i></span>'
	});

	//objedt-fit（IE対策）
	objectFitImages();


});




