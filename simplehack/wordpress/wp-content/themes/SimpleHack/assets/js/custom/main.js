// Load Google Maps
function loadGoogleMaps() {
    if (typeof google === 'object' && typeof google.maps === 'object') {
        GLOBAL_SITE.googleMapsLoaded = true;
    } else {
       if(!GLOBAL_SITE.googleMapsInit) {
            var tag = document.createElement('script');
            tag.src = 'https://maps.googleapis.com/maps/api/js?key='+GLOBAL_SITE.googleMapsKey+'&libraries=places&callback=googleMapsCallabck';
            tag.setAttribute('defer','');
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            GLOBAL_SITE.googleMapsInit = true;
       }
    }
}

function googleMapsCallabck() {
    GLOBAL_SITE.googleMapsLoaded = true;
}

function showGoogleMaps() {
    $('.google-map').each(function(index) {

        var lat = $(this).data('lat');
        var lng = $(this).data('lng');
        var $map = $(this);
        var locations = [];
        var location = [
            lat, lng
        ];
        locations.push(location);

        var map = new google.maps.Map($map[0], {
            zoom: 16,
            center: new google.maps.LatLng(lat, lng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
            //styles: GoogleMapsStyle
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var markers = new Array();
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map,
                animation: google.maps.Animation.DROP
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent('<div class="google-map-info-window"><strong>Food Factory M &amp; J AB</strong><br>Fabriksvägen 12<br>435 35 Mölnlycke</div>');
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    });
}


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

    if($('.google-map').length) {
        var checkGoogleInit = setInterval(function() {
            if(GLOBAL_SITE.googleMapsLoaded) {
                clearInterval(checkGoogleInit);
                showGoogleMaps();

            } else {
                loadGoogleMaps();
            }
        }, 100);
    }

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

var GoogleMapsStyle = [
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    }
];
