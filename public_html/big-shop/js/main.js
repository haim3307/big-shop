/*
 * Auto-generated content from the Brackets New Project extension.
 */

/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */
/*global $, window, document */

// Simple jQuery event handler

function mainJs() {
	alert('hi');
	jQuery(window).load( function() {
		window.dispatchEvent(new Event('resize'));
	});
	function toggleThirdNav(e) {
		if (window.scrollY > 200) $('.thirdNav').addClass('fixedBar');
		else $('.thirdNav').removeClass('fixedBar');
	}

	toggleThirdNav();

	$(window).on('scroll', function (e) {
		toggleThirdNav(e);
	});
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
			'X-Requested-With': 'XMLHttpRequest'
		}
	});

	jQuery.prototype.menuBoard = function ($menuButtons) {
		var _self = this;
		$menuButtons.on('mouseenter', function (e) {
			//$menuButtons.removeClass('menuBtnActive');
			if (window.innerWidth > 910) {
				var boardId = $(this).data('boardId');
				if (boardId) {
					//$(this).addClass('menuBtnActive');
					_self.html($('div[data-board-id="' + boardId + '"]').html());
					_self.show();
				} else _self.hide();
				_self.on('mouseleave', (e) => {
					//$(this).removeClass('menuBtnActive');
					_self.hide();
					/*						$(this).on('mouseleave',function (e) {
												$(this).removeClass('menuBtnActive');
												$(this).off('mouseleave');
											});*/
				});
			}
		});
	};
	jQuery(function($){
		$('.menuBoard').menuBoard($('.mainNav ul li'));
		setTimeout(function () {
			let fc = true;
			$('#mobileHamburger').on('click', function (e) {
				if (fc) {
					$(this).siblings('.mainNav').children('ul').removeClass('hideMenu').hide().slideToggle();
					fc = false;
				}
				else {
					$(this).siblings('.mainNav').children('ul').slideToggle();
				}

			});
		})
	});

	(($, n, e) => {
		var o = $();
		$.fn.dropdownHover = function (e) {
			return "ontouchstart" in document ? this : (o = o.add(this.parent()) && this.each(function () {
				function t(e) {
					o.find(":focus").blur(), h.instantlyCloseOthers === !0 && o.removeClass("open"), n.clearTimeout(c), i.addClass("open"), r.trigger(a)
				}

				var r = $(this),
					i = r.parent(),
					d = {
						delay: 100,
						instantlyCloseOthers: !0
					},
					s = {
						delay: $(this).data("delay"),
						instantlyCloseOthers: $(this).data("close-others")
					},
					a = "show.bs.dropdown",
					u = "hide.bs.dropdown",
					h = $.extend(!0, {}, d, e, s),
					c;
				i.hover(function (n) {
					return i.hasClass("open") || r.is(n.target) ? void t(n) : !0
				}, function () {
					c = n.setTimeout(function () {
						i.removeClass("open");
						r.trigger(u);
					}, h.delay)
				}), r.hover(function (n) {
					return i.hasClass("open") || i.is(n.target) ? void t(n) : !0
				}), i.find(".dropdown-submenu").each(function () {
					var e = $(this),
						o;
					e.hover(function () {
						n.clearTimeout(o), e.children(".dropdown-menu").show(), e.siblings().children(".dropdown-menu").hide()
					}, function () {
						var t = e.children(".dropdown-menu");
						o = n.setTimeout(function () {
							t.hide()
						}, h.delay)
					})
				})
			}))
		};
		jQuery(function($){
			$('[data-hover="dropdown"]').dropdownHover()
		});
	})(jQuery, this);

	$(window).on('load', function () {
		// noinspection JSPotentiallyInvalidConstructorUsage

		$(window).on('resize', function () {
			if(window.innerWidth >= 1111){
				$('#controlCarousel').attr('max', ($('.itemDragSlider .flickity-slider').children().length - 2) * $('.dragItem').width()+10);
			}else {
				$('#controlCarousel').attr('max', (($('.itemDragSlider .flickity-slider').children().length - 2) * $('.dragItem').width()) + 250);
			}
			if (window.innerWidth >= 1111) $('.mainNav').children('ul').css('display', 'flex');
			else $('.mainNav').children('ul').css('display', 'grid');
		});

	});
}