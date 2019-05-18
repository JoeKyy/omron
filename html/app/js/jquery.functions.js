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

	$(document).scroll(function () {
		if ($(window).scrollTop() > 50) {

			$("body > header").removeClass('header--opacity');

		} else if ($(window).scrollTop() < 50) {

			$("body > header").addClass('header--opacity');

		}
	});

	$('.rotate').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	$(window).on('resize orientationchange', function () {
		$('.slide').slick('resize');
	});
});