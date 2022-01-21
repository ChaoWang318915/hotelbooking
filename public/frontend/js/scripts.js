(function($) {
	'use strict';

	var screenRes_ = {
			isDesktop: true,
			isTablet: false,
			isMobile: false
		},
		pageScrollTop = 0;

	$(document).ready(function() {
		checkScreenSize();
		imgToBg();
		initMobileMenu();
		initGuestsBoxDropdown();
		initGuestsBox();
		initAtollsBox();
		initTestimonialsCarousel();
		initBookmarkLink();
		initHotelItemsLoad();
		initStickyItems();
		initSideMenu();
		initLozad();
		initRatingWidget();
		initRateItemsList();
		initInputItem();

		// dev 2
		initGallery();
		initStarsFilter();
		initSliderFilter();
		initLists();
		initRadioAccordion();

		initSideModal();
		accordion();
		initPopup();

		// dev 3

		// dev 4

		// dev 5

	});

	$(window).on('load', function() {

		// dev 2

		// dev 3

		// dev 4

		// dev 5

	});
	
	$(window).on('resize', function() {
		checkScreenSize();

		// dev 2

		// dev 3

		// dev 4

		// dev 5

	});

	$(window).scroll(function() {
		$('body').toggleClass('scrolled', $(window).scrollTop() > 0);

		// dev 2

		// dev 3

		// dev 4

		// dev 5
	});

	// check screen size
	function checkScreenSize() {
		var winWidth = $(window).outerWidth();

		screenRes_.isDesktop = (winWidth > 1024);
		screenRes_.isMobile = (winWidth < 768);
		screenRes_.isTablet = (!screenRes_.isMobile && (winWidth < 992));
	}
	// end check screen size

	// set image to background
	function setImageToBg($img, $target) {
		if ($img.length) {
			$target = $target || $img.parent();
			var src = (typeof $img[0].currentSrc === "undefined") ? $img[0].src : $img[0].currentSrc;
			$target.css('background-image', 'url('+ src +')');
			$img.addClass('d-none');
		}
	}

	function imgToBg() {
		$('.bg-img').each(function() {
			var $target = $(this),
				$img = $target.find('img');

			setImageToBg($img, $target);  // old browsers
			$img.on('load', function() {
				setImageToBg($img, $target);
			});
		});
	}
	// end set image to background

	// init mobile menu
	function getMainNavWidth() {
		return $('.main-nav').outerWidth();
	}

	function initMobileMenu() {
		var TIMEOUT = 300;

		$('<span class="fader"/>').appendTo('body').css('opacity', 0);
		var headerHeight = $('#header').outerHeight();
		
		$(window).on('resize', function() {
			headerHeight = $('#header').outerHeight();
		});

		$('#header .btn-menu, .fader').click(function() {
			if (!$('html').hasClass('open-menu')) {
				//pageScrollTop = $(window).scrollTop() - 65;
				pageScrollTop = $(window).scrollTop() - headerHeight;
				$('html').addClass('open-menu');
				$('.fader').css('display', 'block').animate({
					opacity: 0.7,
					right: getMainNavWidth()
				}, TIMEOUT);
				$('.main-nav').animate({'margin-right': 0}, TIMEOUT);
				$('.wrapper').css('top', -pageScrollTop + 'px');
			} else {
				$('.fader').animate({
					opacity: 0,
					right: 0
				}, TIMEOUT, function(){
					$(this).css('display', 'none');
					$('html').removeClass('open-menu');
					$('.wrapper').css('top', 0);
					$('html, body').stop().animate({
						scrollTop: pageScrollTop
					}, 0);
				});
				$('.main-nav').animate({'margin-right': '-' + getMainNavWidth()}, TIMEOUT);
			};
			return false;
		});
	}
	// end init mobile menu

	// init guests box dropdown
	function initGuestsBoxDropdown() {
		$('.guests-box .guests-opener').click(function(e) {
			$(this).closest('.guests-box').toggleClass('opened');
			e.preventDefault();
			return false;
		});
	}

	$(document).on('mouseup touchend ', function (e) {
		var container = $('.guests-box');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			$('.guests-box').removeClass('opened');
		}
	});
	// end init guests box dropdown

	// init guests box
	function initGuestsBox() {
		$('.guests-box').each(function() {
			var $wrap = $(this),
				$drop = $wrap.find('.guests-dropdown'),
				$opener = $wrap.find('.guests-opener');

			$drop.find('.adults-input').on('change input', function(e) {
				$opener.find('.adults-num').html(this.value);
			});

			$drop.find('.childs-input').on('change input', function(e) {
				$opener.find('.childs-num').html(this.value);
			});

			$drop.find('.rooms-input').on('change input', function(e) {
				$opener.find('.rooms-num').html(this.value);
			});

			initSpinner($wrap.find('.num-box'));
		});
	}
	// end init guests box

	// init spinner
	function initSpinner($jqObj) {
		$jqObj.each(function() {
			var $spinner = $(this);
			var LIMIT_UP = $spinner[0].hasAttribute('data-max') ? parseInt($spinner.attr('data-max')) : 99,
				LIMIT_DOWN = $spinner[0].hasAttribute('data-min') ? parseInt($spinner.attr('data-min')) : 1;
			
			var	$btnUp = $spinner.find('.btn-increase'),
				$btnDn = $spinner.find('.btn-decrease'),
				$input = $spinner.find('input');

			$btnUp.on('click', function(e) {
				e.preventDefault();

				// convert str to num
				var cnt = +$input.val();

				if (cnt < LIMIT_UP) { cnt++; }
				checkDisabledBtns(cnt);
				$input.val( cnt );
				$input.trigger('change');
			});

			$btnDn.on('click', function(e) {
				e.preventDefault();

				// convert str to num
				var cnt = +$input.val();

				if (cnt > LIMIT_DOWN) { cnt--; }
				checkDisabledBtns(cnt);
				$input.val( cnt );
				$input.trigger('change');
			});

			$input.on('input', function(e) {
			// $input.on('change', function(e) {
				// convert str to num
				var str = +$(this).val();

				// get int
				str = ~~str;

				if (str < LIMIT_DOWN) {
					str = LIMIT_DOWN;
				} else if (str > LIMIT_UP) {
					str = LIMIT_UP;
				}
				checkDisabledBtns(str);
				$input.val( str );
			});

			function checkDisabledBtns(val) {
				$btnDn.toggleClass('disabled', (val === LIMIT_DOWN) );
				$btnUp.toggleClass('disabled', (val === LIMIT_UP) );
			}
		});
	}
	// end init spinner

	// init atolls box
	function initAtollsBox() {
		$('.atolls-box').each(function() {
			var $atollsBox = $(this);

			$atollsBox.find('.atolls-image-tab').hide();

			$atollsBox.find('.atolls-links a').mouseenter(function() {
				$(this).closest('.atolls-box').find('.atolls-image-tab'+$(this).attr('data-tab')).show().addClass('active').siblings('.atolls-image-tab').hide().removeClass('active');
				return false;
			});

			$atollsBox.find('.atolls-links a').mouseleave(function() {
				$(this).closest('.atolls-box').find('.atolls-image-tab').hide().removeClass('active');
				return false;
			});
		});
	}
	// end init atolls box

	// init testimonials carousel
	function initTestimonialsCarousel() {
		$('.testimonials-carousel').each(function () {
			var $slider = $(this).find('.slides');

			var opts = {
				dots: false,
				arrows: true,
				appendArrows: $(this),
				infinite: true,
				fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true
			};

			init();

			function init() {
				if (!$slider.is('.slick-initialized')) {
					initSlider();
				}
			}

			function initSlider() {
				$slider.slick(opts);
			}
		});
	}
	// end init testimonials carousel

	// init bookmark link
	function initBookmarkLink() {
		$('.bookmark-link').click(function(e) {
			$(this).toggleClass('active');
			e.preventDefault();
			return false;
		});
	}
	// end init bookmark link

	// init hotel items load
	function initHotelItemsLoad() {
		$('.hotels-list-load-js').lazyLoader({
			jsonFile: 'json/hotels.json',
			mode: 'scroll',
			limit: 3,
			records: 100,
			offset: 1
		});
	}
	// end init hotel items load

	// init sticky items
	function initStickyItems() {
		$('.sticky-item').each(function() {
			var $el = $(this);

			$el.stick_in_parent({
				offset_top: 0,
				parent: $(this).closest('.content-area')
			});
		});
	}
	// end init sticky items

	// init side menu
	function initSideMenu() {
		$('.side-menu li').has('> ul').addClass('has-drop');

		$('.side-menu .has-drop > a').each(function() {
			$('<span class="opener"><span></span></span>').appendTo(this);
		});

		$('.side-menu .has-drop > a .opener').click(function () {
			$(this).closest('li').find('> ul').slideToggle(300);
			$(this).closest('li').toggleClass('opened');
			return false;
		});
	}
	// end init side menu

	// init lozad
	function initLozad() {
		if (typeof Object.assign != 'function') {
		Object.assign = function(target) {
			'use strict';
				if (target == null) {
					throw new TypeError('Cannot convert undefined or null to object');
				}

				target = Object(target);
				for (var index = 1; index < arguments.length; index++) {
					var source = arguments[index];
					if (source != null) {
						for (var key in source) {
							if (Object.prototype.hasOwnProperty.call(source, key)) {
								target[key] = source[key];
							}
						}
					}
				}
				return target;
			};
		}

		const observer = lozad();
		observer.observe();
	}
	// end init lozad

	// init rating widget
	function initRatingWidget() {
		$('.rating-widget-interactive').each(function() {
			var $ratingWidget = $(this),
				$star = $ratingWidget.find('li');

			$star.click(function () {
				$(this).toggleClass('inactive');
				$(this).prevAll().removeClass('inactive');
				$(this).nextAll().addClass('inactive');
				return false;
			});	
		});
	}
	// end init rating widget

	// init rate items list
	function initRateItemsList() {
		$('.rate-items-list > li:even').addClass('even');
	}
	// end init rate items list

	// init input item
	function initInputItem() {
		$('.input-item .form-control').each(function() {
			var $control = $(this),
				$parent = $control.closest('.input-item'),
				FILLED_CLASS = 'filled',
				FOCUS_CLASS = 'focus';

			checkFilled();

			$control.on('blur', function() {
				$parent.removeClass(FOCUS_CLASS);
				checkFilled();
			});

			$control.on('focus', function() {
				$parent.addClass(FOCUS_CLASS + ' ' + FILLED_CLASS);
			});

			function checkFilled() {
				$parent.toggleClass(FILLED_CLASS, $control.val().length > 0);
			}
		});
	}
	// end init input item

	// dev 2

	// init gallery modal
	function initGallery() {
		var $slider_1 = $('.gallery .slider');
		var $slider_2 = $('.gallery .thumbs');
		
		if ($slider_1.length && !$slider_1.is('.slick-initialized')) {
			$slider_1.each(function() {
				$(this).slick({
					rows: 0,
					slide: '.slide',
					dots: false,
					arrows: false,
					autoplaySpeed: 7000,
					lazyLoad: 'ondemand',
					//asNavFor: $slider_2,
				});
			});
		}
		if ($slider_2.length && !$slider_2.is('.slick-initialized')) {
			$slider_2.each(function() {
				$(this).slick({
					rows: 0,
					slide: '.slide',
					dots: false,
					autoplaySpeed: 7000,
					lazyLoad: 'ondemand',
					slidesToShow: 6,
					slidesToScroll: 1,
					asNavFor: $slider_1,
					focusOnSelect: true,
					swipeToSlide: true,
					prevArrow: '<a class="arrow-prev" href="#"><i class="fa fa-chevron-left"></i></a>',
					nextArrow: '<a class="arrow-next" href="#"><i class="fa fa-chevron-right"></i></a>',
					responsive: [
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 4
							}
						}
					]
				});
			});
		}
		$('[data-fancybox]').fancybox({
			afterShow: function( instance, current ) {
				$slider_1.slick('setPosition');
				$slider_2.slick('setPosition');
			}
		});
	}
	// end gallery modal

	// init stars filter
	function initStarsFilter() {
		$('.stars li label input').change(function () {
			if($(this).is(":checked")) {
				$(this).closest('li').addClass('active').prevAll().addClass('active');
				$(this).closest('li').nextAll().removeClass('active');
			}
		});
		$('.stars li label input').each(function() {
			if($(this).is(":checked")) {
				$(this).closest('li').addClass('active').prevAll().addClass('active');
				$(this).closest('li').nextAll().removeClass('active');
			}
		});
	}
	// end stars filter

	// init slider filter
	function initSliderFilter() {
		$('.range-slider').each(function() {
			var $slider = $(this);
			var range = $slider.data('range');
			var	min = $slider.data('min');
			var	max = $slider.data('max');
			var	values = $slider.data('values');
			var	value = $slider.data('value');

			$slider.slider({
				range: range,
				min: min,
				max: max,
				values: values,
				value: value,
				create: function( event, ui ) {
					$(event.target).find('.ui-slider-handle').each(function(index, el){
						var slider_el = $(el).closest('.range-slider');
						if (typeof slider_el.data('values') !== 'false') {
							$(el).text(value);
						} 
						if (typeof slider_el.data('value') !== 'false') {
							$(el).text(values[index]);
						}
						$(el).wrapInner('<span class="amount"></span>');
					});
				},
				slide: function(event, ui) {
					$(ui.handle).text(ui.value);
					$(ui.handle).wrapInner('<span class="amount"></span>');
					$(event.target).find('.ui-slider-handle').each(function(index, el){
						var $val = $(el).closest('.range-slider').siblings('.slider-note').find('.val');
						$val.text(ui.value);
					});
				}
			});
		});
	}
	// end slider filter

	function initLists() {
		document.querySelectorAll('ul, ol').forEach(function(list) {
			if (!list.hasAttribute('class')) {
				list.classList.add('without-class');
			}
		});
	}

	function initRadioAccordion() {
		const ACTIVE_CLASS = 'in';
		const OPENED_CLASS = 'active';

		$('.trip-info .payment-block .panel-group .panel .panel-heading input[type="radio"]').each(function() {
			let $radio = $(this);
			let $panel = $radio.closest('.panel');
			let $body = $panel.find('.panel-collapse');

			if ($body.length) {
				check();

				$radio.on('change', check);
			}

			function check() {
				if ($radio.is(':checked')) {
					$body.addClass(ACTIVE_CLASS);
					$panel.addClass(OPENED_CLASS);
					closeOthers();
				} else {
					$body.removeClass(ACTIVE_CLASS);
					$panel.removeClass(OPENED_CLASS);
				}
			}

			function closeOthers() {
				$panel
					.siblings()
					.removeClass(OPENED_CLASS)
					.find('.panel-collapse')
					.removeClass(ACTIVE_CLASS)
				;
			}
		});
	}

	function initSideModal() {
		$('[data-toggle-modal]').each(function() {
			var $this = $(this);
			var href = $this.attr('href');
			var $close = $(href).find('.modal-close');
			var $overlay = $('.side-modal-overlay');

			$this.on('click', function(e) {
				e.preventDefault();
				$('html, body').stop().animate({
					scrollTop: 0,
				}, 500);
				if (!$(href).hasClass('open')) {
					$(href).addClass('open');
				} else {
					$(href).removeClass('open');
				};
				if (!$('html').hasClass('open-side-modal')) {
					$('html').addClass('open-side-modal');
				} else {
					$('html').removeClass('open-side-modal');
				};
			});
			
			$close.on('click', function(e) {
				e.preventDefault();
				$('.side-modal').removeClass('open');
				$('html').removeClass('open-side-modal');
			});

			$overlay.on('click', function(e) {
				e.preventDefault();
				$('.side-modal').removeClass('open');
				$('html').removeClass('open-side-modal');
			});
		});
	}

	function accordion() {
		$('.accordion > li').each(function(){
			if($(this).hasClass('open')) {
				$(this).find('.collapse').slideDown(0);
			}
		});
		$('.accordion .title-panel').click(function(){
			$(this).siblings('.collapse').slideToggle().closest('li').toggleClass('open')
			.siblings('.open').removeClass('open').children('.collapse').slideUp();
		});
	}

	function initPopup() {
		$('[data-toggle-popup]').each(function() {
			var $this = $(this);
			var href = $this.attr('href');

			$this.on('click', function(e) {
				e.preventDefault();
				if (!$(href).hasClass('open')) {
					$(href).addClass('open');
				} else {
					$(href).removeClass('open');
				};
			});

			$(document).on('mouseup touchend ', function (e) {
				var container = $('.popup');
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					$('.popup').removeClass('open');
				}
			});
		});
	}

	// dev 3

	// dev 4

	// dev 5

})(this.jQuery);
