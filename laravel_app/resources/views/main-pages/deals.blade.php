@extends('layouts.master')
@section('head')


    <link rel='stylesheet' id='exgym-woocommerce-css' href="{{asset('css/woo.css')}}" type='text/css' media='all'/>

    <link rel='stylesheet' id='kc-general-css' href={{asset('css/specialGeneral.css')}} type='text/css' media='all'/>
    <style type="text/css" id="kc-css-general">
        .kc-off-notice {
            display: inline-block !important;
        }

        .kc-container {
            max-width: 1200px;
        }</style>
    <style type="text/css" id="kc-css-render">
        body.kc-css-system .kc-css-423488 {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
    <style>
        .kc_tabs .kc_tabs_nav {
            min-height: auto !important;
            border: 1px solid #ececec !important;
            float: none !important;
            display: inline-block;
            padding: 14px 50px 9px;
        }

        .kc_tabs_nav, .nav-pills {
            line-height: 45px;
            margin: 0;
            padding: 0;
        }

        .kc_tabs .kc_tabs_nav > li {
            border: 0;
            float: none;
            vertical-align: middle;
        }

        /*style Deal products EXGYM*/
        .woo-deals .owl-item:nth-child(2n) .product-block:after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: "";
            background: transparent;
            border: 10px solid #bf0d0d;
            pointer-events: none;
        }

        .woo-deals .owl-item .product-block span.onsale-wrap .onsale, .woo-deals .owl-item .product-block span.onsale-wrap .sale-off {
            top: 20px;
            left: 20px;
        }

        .woo-deals .owl-item .product-block .caption {
            padding-bottom: 40px;
        }

        .woo-deals .time .timer-left {
            display: none;
        }

        .woo-deals .countdown-times div {
            display: inline-block;
            width: 62px;
            height: 62px;
            color: #000;
            background: #d4d4d4;
            font-family: Exo\ 2;
            margin: 0 7px;
        }

        @media (max-width: 1199px) {
            .woo-deals .countdown-times div {
                width: 50px;
                height: 50px;
            }
        }

        .woo-deals .countdown-times b, .woo-deals .countdown-times span {
            display: block;
        }

        .woo-deals .countdown-times b {
            font-size: 18px;
            line-height: 24px;
            margin-top: 5px;
            margin-bottom: 2px;
        }

        @media (max-width: 1199px) {
            .woo-deals .countdown-times b {
                font-size: 16px;
                line-height: 18px;
            }
        }

        .woo-deals .countdown-times span {
            font-size: 14px;
            line-height: 24px;
        }

        @media (max-width: 1199px) {
            .woo-deals .countdown-times span {
                font-size: 14px;
                line-height: 16px;
            }
        }

        .woo-deals .time-wrapper {
            position: absolute;
            bottom: 53px;
            left: 0;
            right: 0;
        }

        @media (max-width: 991px) {
            .woo-deals .time-wrapper {
                top: 50%;
                left: 50%;
                width: 100%;
                right: auto;
                bottom: auto;
                -webkit-transform: translateX(-50%) translateY(-50%);
                -ms-transform: translateX(-50%) translateY(-50%);
                -o-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
            }
        }

        /****/
        /*style product-list EXGYM*/
        .product-block-v3.product-block {
            text-align: left;
        }

        .product-block-v3.product-block .image {
            float: left;
            width: 85px;
        }

        .product-block-v3.product-block .image:before {
            display: none;
        }

        .product-block-v3.product-block .caption {
            float: left;
            width: calc(100% - 85px);
            padding: 0 30px;
        }

        @media (max-width: 991px) {
            .product-block-v3.product-block .caption {
                padding: 0 15px;
            }
        }

        .product-block-v3.product-block .button-action, .product-block-v3.product-block .rating, .product-block-v3.product-block span.onsale-wrap .onsale, .product-block-v3.product-block span.onsale-wrap .sale-off {
            display: none;
        }

        .product-block-v3.product-block .name {
            margin-bottom: 8px;
        }

        @media (max-width: 991px) {
            .product-block-v3.product-block .name {
                font-size: 13px;
                line-height: 18px;
            }
        }

        /****/
        .kc-elm {
            float: left;
            width: 100%;
        }

        #page {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            overflow-x: hidden;
        }

        .entry-content-page {
            position: relative;
        }

        .kc_clfw {
            width: 100% !important;
            clear: both !important;
            display: block !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .kc-col-container {
            clear: both;
            display: block;
            width: 100%;
        }

        .kc_tabs {
            display: inline-block;
            width: 100%;
            position: relative;

        }

        .kc_accordion_wrapper, .kc_tabs {
            margin-bottom: 24px;
        }

        .kc_wrapper.ui-tabs {
            width: 100%;
            display: inline-block;
        }

        .kc_tabs > .kc_wrapper > .kc_tabs_nav {
            background: #eee;
            float: left;
            min-height: 50px;
            margin: 0;
            width: 100%;
        }

        .kc_tabs_nav:after, .kc_tabs_nav:before, .nav-pills:after, .nav-pills:before {
            display: table;
            line-height: 0;
            content: "";
        }

        .kc_wrapper > ul.ui-tabs-nav > li {
            overflow: hidden;
        }

        .kc_tabs .kc_tabs_nav > li, .kc_tabs .kc_tabs_nav > li.ui-tabs-active:hover {
            display: inline-block;
        }

        .kc_tabs .kc_tabs_nav > li {
            border: 0;
            float: none;
            vertical-align: middle;
        }

        .kc_tabs_nav > .ui-tabs-active, .kc_tabs_nav > .ui-tabs-active:hover, .kc_tabs_nav > .ui-tabs-active > a, .kc_tabs_nav > .ui-tabs-active > a:hover {
            color: #555;
            display: block;
        }

        .kc_tabs_nav > li {
            list-style: none;
            border-right: 1px solid #fff;
            border-left: none !important;
            border-bottom: none !important;
            margin: 0;
            float: left;
            color: #333;
            box-shadow: none;
            cursor: pointer;
        }

        .kc_tabs .kc_tab_content {
            padding: 0 !important;
        }

        .kc_tabs_nav > .ui-tabs-active, .kc_tabs_nav > .ui-tabs-active:hover, .kc_tabs_nav > .ui-tabs-active > a, .kc_tabs_nav > .ui-tabs-active > a:hover {
            color: #555;
            display: block;
        }

        @media (min-width: 992px) {
            .product-block:hover .image:before {
                width: 100%;
                left: 0;
                visibility: visible;
                opacity: 1;
            }
        }

        @media (min-width: 992px) {
            .product-block .image:before {
                content: "";
                z-index: 1;
                overflow: hidden;
                display: block;
                visibility: hidden;
                pointer-events: none;
                position: absolute;
                bottom: 0;
                left: 50%;
                background: rgba(191, 13, 13, .75);
                opacity: 0;
                width: 0;
                height: 100%;
                -webkit-transition: all .3s ease;
                -o-transition: all .3s ease;
                transition: all .3s ease;
            }
        }

        .product-block .image {
            position: relative;
            overflow: hidden;
            margin: 0;
            z-index: 0;
        }

        .product-block .caption {
            position: relative;
            background: transparent;
            padding: 40px 10px 10px;
        }

        .kc_tabs_nav > li > a, .nav-pills > li > a {
            padding: 0 30px;
            text-decoration: none;
            outline: 0;
            display: block;
            line-height: 50px;
            color: #6b6b6b;
        }
    </style>
@endsection
@section('content')

    <div id="page" class="hfeed site page-home-1">
        <section id="main" class="site-main">
            <section id="main-container" class="container-fluid inner">
                <div class="f-row">


                    <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
                        <div id="primary" class="content-area">
                            <div id="content" class="site-content" role="main">


                                <article id="post-9473" class="post-9473 page type-page status-publish hentry">
                                    <div class="entry-content-page">
                                        <div class="kc_clfw"></div>
                                        <section>
                                            <div class="container-1112">

                                                <div class="kc-elm">
                                                    <div class="kc-col-container">
                                                        <div data-open-on-mouseover="" data-tab-active="1"
                                                             data-effect-option=""
                                                             class="kc-elm kc-css-604741 kc_tabs group">
                                                            <div class="kc_wrapper ui-tabs kc_clearfix">
                                                                <ul class="kc_tabs_nav ui-tabs-nav kc_clearfix">
                                                                    <li class="ui-tabs-active"><a
                                                                                href="#today-deals"
                                                                                data-prevent="scroll">Today
                                                                            deals</a></li>
                                                                    <li><a href="#pass-deals" data-prevent="scroll">Pass
                                                                            deals</a></li>
                                                                </ul>
                                                                <div id="today-deals"
                                                                     class="kc-elm kc-css-432256 kc_tab ui-tabs-panel kc_ui-tabs-hide kc_clearfix ui-tabs-body-active kc-section-active">
                                                                    <div class="kc_tab_content">
                                                                        <div class="woo-deals">


                                                                            <div class="widget_products" id="Gwyes">
                                                                                <style>
                                                                                    .products-inner {
                                                                                        grid-auto-rows: 700px;
                                                                                    }
                                                                                </style>
                                                                                <div class="products-inner f-row">
                                                                                    @foreach($lists['deals'] as $deal)
                                                                                        <div class="pos-right col-md-4 col-sm-6">
                                                                                            @include('items.special-item',['product'=>$deal,'dealMode'=>1])
                                                                                        </div>
                                                                                    @endforeach


                                                                                </div>
                                                                            </div>


                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div id="pass-deals"
                                                                     class="kc-elm kc-css-231737 kc_tab ui-tabs-panel kc_ui-tabs-hide kc_clearfix">
                                                                    <div class="kc_tab_content">
                                                                        <div class="woo-deals">


                                                                            <div class="widget_products" id="pQNcf">
                                                                                <div class="products-inner row">

                                                                                    @foreach($expired_deals as $deal)
                                                                                        <div class="pos-right col-md-4 col-sm-6">
                                                                                            @include('items.special-item',['product'=>$deal,'dealMode'=>1])
                                                                                        </div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>


                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-## -->

                            </div><!-- #content -->
                        </div><!-- #primary -->

                    </div><!-- #main-content -->

                </div>
            </section>
        </section>
    </div>
    <!-- #page -->

    <div class="modal fade" id="opal-quickview-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body"><span class="spinner"></span></div>
            </div>
        </div>
    </div>


@endsection
@section('script')


    <style>
        .row {
            display: flex !important;
        }
    </style>
    <script>

			function tplJQUI() {
				/*
                                $('.ui-tabs').tabs()
                */
							load.js('http://demo3.wpopal.com/exgym/wp-content/themes/exgym/js/woocommerce.js?ver=20131022');
							$('.ui-tabs').tabs();
			}



    </script>
@endsection
