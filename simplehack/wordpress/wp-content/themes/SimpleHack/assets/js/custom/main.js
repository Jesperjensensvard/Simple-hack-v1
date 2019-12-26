$(function() {

    $('.main-menu__inner > div > .menu > .menu-item-has-children').append('<span class="menu__icon"></span>');

    $('.menu__icon').on('click', function() {
        $(this).addClass('menu__icon--is-active');

        $parent = $(this).parent();
        //$parent = $(this).parent().addClass('menu__item--is-active');

        if ($parent.hasClass('menu__item--is-active')) {
            $('.menu-item-has-children').removeClass('menu__item--is-active');
        } else {
            $('.menu-item-has-children').removeClass('menu__item--is-active');
            $parent.addClass('menu__item--is-active');
        }
    });
    
     //Trigga meny
     $('.menu-trigger').on('click', function() {

        if ($(window).width() < 767) {
            $('.header-callout__item').appendTo($('.main-menu__inner'));
        }
        $(this).addClass('menu-trigger--go-up');
        $('.main-menu').addClass('active');
        $('body').addClass('g-noscroll');
        $('.g-page-overlay').addClass('active');
        return false;
    });

    $('.menu-close').on('click', function() {
        $('.menu-trigger').removeClass('menu-trigger--go-up');
        $('.main-menu').removeClass('active');
        $('body').removeClass('g-noscroll');
		$('.g-page-overlay').removeClass('active');
        if ($('body').hasClass('spec')) {
            $('.main-menu__spec').before($('.main-menu__brand'));
        }
        if ($(window).width() < 767) {
            $('.header-callout__item').appendTo($('.header-callout'));
        }
        return false;
    });

    $(document).on('click', '.g-page-overlay', function() {
        $('.main-menu').removeClass('active');
		$('.g-page-overlay').removeClass('active');
        $('body').removeClass('g-noscroll');
	});


    setTimeout(function() {
		$('.image-responsify img').responsify();
        $('.hero__img img').responsify();
    }, 250);

    setTimeout(function() {
    if ($(window).width() > 480) {
    }}, 100);

    if ($('.hero').length) {
        var slider = $('.hero').royalSlider({
            arrowsNav: true,
            keyboardNavEnabled: true,
            controlsInside: false,
            imageScaleMode: 'fit',
            autoHeight: false,
            arrowsNavAutoHide: false,
            addActiveClass: true,
            imageAlignCenter: true,
            controlNavigation: 'bullets',
            loop: true,
            thumbsFitInViewport: false,
            navigateByClick: false,
            startSlideId: 0,
            autoPlay: {
                // autoplay options go gere
                enabled: true,
                delay: 5000,
                pauseOnHover: true
            },
            transitionType: 'move',
            globalCaption: false,
            deeplinking: {
                enabled: true,
                change: false
            },
        }).data('.hero');
    }

});

window.resizeStatus = 'load';

$(window).resize(function() {

	if(window.resizeStatus != 'start') {
		setTimeout(function() {
            $('.image-responsify img').responsify();
            $('.hero__img img').responsify();
			window.resizeStatus = 'done';
		}, 300);
	}
	window.resizeStatus = 'start';
})

