<script>
    //lib-js
    window.onload = function () {
        updateCartedButtons();
    };
    String.prototype.capitalize = function () {
        return this.charAt(0).toUpperCase() + this.slice(1);
    };

    function addToCartEvent(e) {
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        var categoryId = $(this).data('category-id');
        var $btn = $(this);
        var product = $btn.data('product') || $btn.get()[0].dataset;
        product.quantity = product.quantity ? Number(product.quantity) : 1;
        var isExistCartItem = false;
        for (var existingItem in shopAppOBJ.data.cartItems) {
            var item = shopAppOBJ.data.cartItems[existingItem];
            if (item.hasOwnProperty('id') && item.id == id) {
                isExistCartItem = true;
                break;
            }
        }
        if (!isExistCartItem && product) {
            shopAppOBJ.data.cartItems.push(product);
            shopAppOBJ.data.addedToCart = true;

            if (!$(e.target).hasClass('buyNow')) {
                shopAppOBJ.data.product = product;
                $('#addedToCartModal').modal('show');
                updateCartedButtons(e);
            } else {
                window.location = BASEURL + '/cart';
            }
        } else if ($(e.target).hasClass('buyNow')) {
            window.location = BASEURL + '/cart';

        }

    }

    function updateCartedButtons(e) {
        console.log('--------update cart-----------');
        var dq = document.querySelectorAll;
        document.querySelectorAll('.addToCartB').forEach(function ($el) {
            $el.removeAttribute('disabled')
        });
        document.querySelectorAll('.addToCartB .btnTitle').forEach(function ($el) {
            $el.innerHTML = 'Add To Cart';
        });
        for (var index in window.shopAppOBJ.data.cartItems) {
            var $mainBTN = document.querySelectorAll('.addToCartB[data-id],.addToCartB[data-product],.addToCartProductPage');
            var $toDisable = [];
            $mainBTN.forEach(function ($findBtn) {
                if ($findBtn.dataset.id == window.shopAppOBJ.data.cartItems[index].id) {
                    $mainBTN = $findBtn;
                    $toDisable.push($findBtn);
                }
            });

            function disable($btnI) {
                if ($btnI.querySelectorAll('.buyNow').length) $btnI = document.querySelector('.addToCartProductPage');
                $btnI.setAttribute('disabled', 'disabled');
                var $btnTitle = $btnI.getElementsByClassName('btnTitle');
                if ($btnTitle.length) $btnTitle[0].innerHTML = '<strong>In cart</strong>';
            }

            if ($toDisable.length) $toDisable.forEach(disable);

        }
    }


    function updateCartedButtonsJQ(e) {

        $('.addToCartB').removeAttr('disabled');
        $('.addToCartB .btnTitle').html('Add To Cart');
        for (var index in window.shopAppOBJ.data.cartItems) {
            var $mainBTN = $('.addToCartB[data-id=' + window.shopAppOBJ.data.cartItems[index].id + ']');
            var $btn = $mainBTN.find('.buyNow').length ? $mainBTN.find('.addToCartProductPage') : $mainBTN;
            $btn.attr('disabled', 'disabled');
            $btn.children('.btnTitle').html('<strong>In cart</strong>');
        }
    }

    load.js(BASE_URL + '/js/lib/http_code.jquery.com_jquery-1.10.1.js')
        .then(function () {

            jQuery(function ($) {

                console.log('1.jquery here');
                jQuery(function ($) {
                    $('.topBarNav .dropdown-menu').on('click', function (e) {
                        e.stopPropagation();
                    });
                    $('#allSiteSearch').on('keyup', function (e) {
                        $.getJSON(BASE_URL + '/api/entities/' + e.target.value).then(function (res) {
                            shopAppOBJ.data.autoCompleteFrontList = res;
                        }, function (e) {
                            shopAppOBJ.data.autoCompleteFrontList = [];
                        });
                    });
                    $('.addToWishB').on('click', function (e) {

                        var wishId = $(this).data('wish-id'), wishUrl = $(this).data('wish-url');
                        $.ajax({
                            url: BASE_URL + '/user/wishlist',
                            method: 'POST',
                            data: {
                                wish_id: wishId,
                                wish_url: wishUrl
                            }
                        });
                    });
                    $('.removeFromList').on('click', function (e) {
                        e.preventDefault();
                        var wishId = $(this).data('wish-id');
                        $.ajax({
                            url: BASE_URL + '/user/wishlist/' + wishId,
                            method: 'DELETE',
                        }).then(function (res) {
                            if (res == 1) {
                                $('[data-wish-id=' + wishId + ']').parent().parent().remove();
                            }
                        });
                    });
                });
                tplJQ();
                load.js(BASE_URL + '/js/lib/http_unpkg.com_flickity@2.1.1_dist_flickity.pkgd.js')
                    .then(function () {
                        onImgLoad('.footer-carousel .carousel-cell img', () => {
                            console.log('3');
                            /*
                                        $('.footer-carousel').flickity('resize');
                            */
                        });

                        console.log('2.flickity here');
                        load.js('https://unpkg.com/flickity-bg-lazyload@1/bg-lazyload.js').then(function () {
                            tplFlick();
                        });
                        tplFlickJQ();

                        (function mainJs() {
                            setTimeout(function () {
                                window.dispatchEvent(new Event('resize'));
                                $('.carousel-cell').css('opacity', '1');

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
                            jQuery(function ($) {
                                $('.menuBoard').menuBoard($('.mainNav ul li'));
                                $(window).on('resize', function () {
                                    if (window.innerWidth >= 1111) $('.mainNav').children('ul').css('display', 'flex');
                                    else $('.mainNav').children('ul').css('display', 'grid');
                                });

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
                                jQuery(function ($) {
                                    $('[data-hover="dropdown"]').dropdownHover()
                                });
                            })(jQuery, this);

                            $(window).on('load', function () {
                                // noinspection JSPotentiallyInvalidConstructorUsage

                                $(window).on('resize', function () {
                                    if (window.innerWidth >= 1111) {
                                        $('#controlCarousel').attr('max', ($('.itemDragSlider .flickity-slider').children().length - 2) * $('.dragItem').width() + 10);
                                    } else {
                                        $('#controlCarousel').attr('max', (($('.itemDragSlider .flickity-slider').children().length - 2) * $('.dragItem').width()) + 250);
                                    }

                                });

                            });
                        })();
                        for (var addonJQ in addonsJQ) if (typeof addonsJQ[addonJQ] == 'function') addonsJQ[addonJQ]();
                        load.js('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js').then(function () {
                            load.js('https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js').then(function () {
                                tplJQBT();
                                $('.addToCartB').on('click', addToCartEvent);
                                $('.quickViewB').on('click', function (e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    var $el = $(this);
                                    var id = $el.data('id');
                                    var categoryId = $el.data('category-id');
                                    var $btn = $el;
                                    var product = $btn.data('product') || $btn.get()[0].dataset;
                                    console.log(product);
                                    product.quantity = product.quantity ? Number(product.quantity) : 1;
                                    $('#product_view').modal('show');
                                    shopAppOBJ.data.quickProduct = product;
                                });
                            });
                        });

                        Promise.all([
                            load.js('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'),
                        ])
                            .then(function () {
                                tplJQUI();

                            }).catch(function (e) {
                            console.log(e);
                            console.log('Oh no, epic failure!1');
                        });


                    }).catch(function (e) {
                    console.log(e);
                    console.log('Oh no, epic failure!');
                });
            });


        });
</script>