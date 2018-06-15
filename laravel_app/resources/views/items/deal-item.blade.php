<div class="product-wrapper product pos-right col-md-4 col-sm-6 " >
    <div class="product-block" data-product-id="5317">
        <figure class="image">

            <span class="onsale">Sale!</span>
            <a title="{{$deal->title}}"
               href="{{url("shop/$deal->c_url/$deal->url")}}"
               class="product-image" style="display: block;height: 479px;">
                <img width="800"
                     height="800"
                     src="{{asset("_img/products/$deal->c_url/$deal->main_img")}}"
                     class="attachment-shop_catalog image-effect"
                     alt=""><img
                        width="800"
                        height="800"
                        src="http://demo3.wpopal.com/exgym/wp-content/uploads/2016/01/product-3-800x800.jpg"
                        class="image-hover wp-post-image"
                        alt="">
                <span class="onsale-wrap"><span class="onsale">-  {{$deal->options->discount->value}}%</span></span>
            </a>

            <div class="button-action button-groups clearfix">
                <div class="action clearfix">

                    <div class="quick-view hidden-xs hidden-sm">
                        <a title="Quick view"
                           href="#"
                           class="quickview"
                           data-productslug="2.5 LB. Classic Olympic Plate"
                           data-toggle="modal"
                           data-target="#opal-quickview-modal">
                            <i class="fa fa-eye"></i><span>Quick view</span>
                        </a>
                    </div>


                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-5317">
                        <div class="yith-wcwl-add-button show d-block">


                            <a title="Add to wishlist"
                               rel="nofollow"
                               class="add_to_wishlist">
                                <i class="fa fa-heart"></i><span>Wishlist</span></a>
                            <img src="{{asset('_img/layout/spin_light.gif')}}"
                                 class="ajax-loading"
                                 alt="loading"
                                 width="16"
                                 height="16"
                                 style="visibility:hidden">
                        </div>

                        <div class="hide"
                             style="display:none;">
                            <span class="feedback">Product added!</span>
                            <a>
                                <i class="fa fa-heart"></i><span>Wishlist</span>
                            </a>
                        </div>

                        <div class="yith-wcwl-wishlistexistsbrowse hide"
                             style="display:none">
                            <span class="feedback">The product is already in the wishlist!</span>
                            <a rel="nofollow">
                                <i class="fa fa-heart"></i><span>Wishlist</span>
                            </a>
                        </div>

                        <div style="clear:both"></div>
                        <div class="yith-wcwl-wishlistaddresponse"></div>

                    </div>

                    <div class="clear"></div>

{{--                    <div class="yith-compare">
                        <a title="Add to compare"
                           class="compare"
                           data-product_id="5317">
                            <i class="fa fa-retweet"></i>
                            <span>Compare</span>
                        </a>
                    </div>--}}

                    <div class="add-cart addToCartB" @include('inc.print-object',['product'=> $deal->getAttributes()]) >
                        <a title="Add to cart"
                           rel="nofollow"
                           class="button product_type_external btn btn-primary"><i
                                    class="fa fa-shopping-cart"></i><span
                                    class="title-cart">Add To Cart</span></a>
                    </div>
                </div>
            </div>

            <div class="time-wrapper">
                <div class="time">
                    <div class="timer-left">
                        Time
                        Left:
                    </div>
                    <div class="pts-countdown clearfix"
                         data-countdown="countdown"
                         data-date="{{Carbon\Carbon::parse($deal->options->end_date->value)->format('M-d-Y-h-m-i')}}">
                        {{--->format('M d Y')--}}
                        {{--05-30-2018-00-00-00--}}
                        <div class="countdown-times">
                            <div class="day">
                                <b>30</b>
                                <span>Days</span>
                            </div>
                            <div class="hours">
                                <b>12</b>
                                <span>Hours</span>
                            </div>
                            <div class="minutes">
                                <b>16</b>
                                <span>Mins</span>
                            </div>
                            <div class="seconds">
                                <b>26</b>
                                <span>Secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </figure>
        <div class="caption">
            <div class="rating">
                <div class="star-rating">
                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span>
                </div>
            </div>

            <h3 class="name"><a
                        href="{{url("shop/$deal->c_url/$deal->url")}}">{{$deal->title}}</a>
            </h3>

            <div class="category-name">
                <a href="{{url("shop/$deal->c_url")}}">{{$deal->c_url}}</a>
            </div>

            <div class="meta">

                    <span class="price">
                        <ins>
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>{{$deal->price}}</span>
                        </ins>
                        @if($deal->options->discount->value)
                            <del><span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">$</span>{{($deal->price*$deal->options->discount->value)/100+$deal->price}}</span></del>
                        @endif
                    </span>


            </div>

        </div>


    </div>
</div>