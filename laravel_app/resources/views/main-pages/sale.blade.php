@extends('layouts.master')
@section('head')
    <link rel='stylesheet' id='prettyPhoto-css'
          href='http://demo3.wpopal.com/exgym/wp-content/themes/exgym/css/prettyPhoto.css?ver=4.9.3' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='tawcvs-frontend-css'
          href='http://demo3.wpopal.com/exgym/wp-content/plugins/variation-swatches-for-woocommerce/assets/css/frontend.css?ver=20160615'
          type='text/css' media='all'/>

    <link rel='stylesheet' id='exgym-woocommerce-css' href="{{asset('css/woo.css')}}" type='text/css' media='all'/>

    <link rel='stylesheet' id='kc-general-css' href={{asset('css/specialGeneral.css')}} type='text/css' media='all'/>
    <style type="text/css" id="kc-css-general">.kc-off-notice {
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
@endsection
@section('content')

    <div id="page" class="hfeed site page-home-1">
        <div class="opal-page-inner row-offcanvas row-offcanvas-left">


            <section id="main" class="site-main">
                <section id="main-container" class="container inner">
                    <div class="row">

                        <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
                            <div id="primary" class="content-area">
                                <div id="content" class="site-content" role="main">


                                    <article id="post-5531" class="post-5531 page type-page status-publish hentry">
                                        <div class="entry-content-page">
                                            <div class="kc_clfw"></div>
                                            <section class="kc-elm kc-css-156444 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-423488 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="widget_products widget_products_inner">
                                                                    @if(count($lists['sales']))

                                                                        <div class="row products-inner">
                                                                            @foreach($lists['sales'] as $product)
                                                                                <div class="col-sm-6 col-md-3 ">
                                                                                    @include('items.special-item')
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div id="more_products">

                                                                            <a href="javascript:void(0);"
                                                                               data-maxitem="10"
                                                                               data-columns="4"
                                                                               data-loading-text="Loading..."
                                                                               data-loadmore="true" data-count="4"
                                                                               data-woocategory=""
                                                                               data-type="sale_products"
                                                                               data-style="inner" data-offset="8">
                                                                                <i class="fa fa-refresh"></i>
                                                                                <span class="text">Show more</span>
                                                                            </a>

                                                                        </div>

                                                                    @else
                                                                        <h2 class="text-center" style="height: 500px;">No Products On Sale..</h2>
                                                                    @endif

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
            </section><!-- #main -->

        </div>
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
			function tpl() {

			}

			function tplJQBT() {
				$('#addedToCartModal').removeClass('show');
			}

			function tplJQ() {
				/*
                load.js('http://demo3.wpopal.com/exgym/wp-content/themes/exgym/js/bootstrap.min.js?ver=20130402');
                */

				load.js('http://demo3.wpopal.com/exgym/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.4');
				load.js('http://demo3.wpopal.com/exgym/wp-content/plugins/kingcomposer/includes/frontend/vendors/waypoints/waypoints.min.js?ver=2.6.17').then(function () {
					load.js('http://demo3.wpopal.com/exgym/wp-content/plugins/kingcomposer/assets/frontend/js/counter.up.min.js?ver=2.6.17');


				});
			}
    </script>
@endsection
