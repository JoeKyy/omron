$(function () {
	$(".botao-menu").on('click', function (e) {
		if (!$(this).hasClass("open")) {
			$(this).addClass("open");
			$('body > header .header__menuContent').addClass("open");
		} else {
			$(this).removeClass("open");
			$('body > header .header__menuContent').removeClass("open");
		}
	});

	var windowsize = $(window).width();

	windowsize = $(window).width();
	if (windowsize <= 1024) {
		$('body>header .header__menu nav ul>li > ul').parent().addClass('parent-menu')
		$('.parent-menu .sub-menu').hide();
	} else {
		$('body>header .header__menu nav ul>li > ul').parent().removeClass('parent-menu')
		$('.parent-menu .sub-menu').show();
	}

	$(".parent-menu").on('click', function (e) {
		e.preventDefault();
		if (!$(this).hasClass("open")) {
			$(this).addClass("open");
			$(this).find('.sub-menu').show();
		} else {
			$(this).removeClass("open");
			$('.parent-menu .sub-menu').hide();
		}
	});

	$('.rotate').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	$('.slide').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	$(window).on('resize orientationchange', function () {
		$('.slide').slick('resize');
	});

	$("main[role='page'].loop nav select, main[role='page'].product nav select").change(function() {
		window.location = $(this).find("option:selected").val();
	});

});