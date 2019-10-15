$(function() {

	//Форма поиска
	$('#search i').click(function(){
		$(this).parent().submit();
	});

	$('.my_hamburger').click(function(){
		//Появление
		if(!$(this).hasClass('is-active')){
			$(this).addClass('is-active');
			$('header').addClass('is-active');
		} else {
			//Скрытие
			$(this).removeClass('is-active');
			$('header').removeClass('is-active');
		}
	});
	$(".authUrl").fancybox({
		fitToView	: false,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'elastic'
	});





})