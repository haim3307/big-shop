@extends('layouts.master')
@section('head')
    <link rel='stylesheet' id='kc-general-css'  href={{asset('css/specialGeneral.css')}} type='text/css' media='all' />

    <style type="text/css" id="kc-css-general">
        .kc-off-notice {
            display: inline-block !important;
        }

        .kc-container {
            max-width: 1200px;
        }
    </style>
    <link rel='stylesheet' id="kc-css-render"  href={{asset('css/specialRender.css')}} type='text/css' media='all' />
@endsection
@section('content')
    <div style="background-color: #fff;" id="page" class="hfeed site page-home-1">
        <div class="opal-page-inner row-offcanvas row-offcanvas-left">

            <section id="main" class="site-main">
                <section id="main-container" class="container-fluid inner" style="padding: 0;">
                    <div class="row">


                        <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
                            <div id="primary" class="content-area">
                                <div id="content" class="site-content" role="main">


                                    <article id="post-1780" class="post-1780 page type-page status-publish hentry">
                                        <div class="entry-content-page">
                                            <div class="kc_clfw"></div>
                                            <section class="kc-elm kc-css-344016 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-12361 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-582254 kc-title-wrap no-border ">

                                                                    <h3 class="kc_title">{{$lists['about'][0]->title}}</h3>
                                                                </div>

                                                                <div class="kc-elm kc-css-448446 divider_line">
                                                                    <div class="divider_inner divider_line1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-652456 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-239892 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-779247 kc_text_block">
                                                                    {!! $lists['about'][0]->options->article->value !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-197227 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-725978 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-637780"
                                                                     style="height:0; clear: both; width:100%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-379142 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-898321 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div id=" "
                                                                     class="kc-elm kc-css-735309 kc_row kc_row_inner">
                                                                    <div class="kc-elm kc-css-848757 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                        <div class="kc_wrapper kc-col-inner-container">
                                                                            <div class="kc_shortcode kc_single_image effect-v8">
                                                                                <img src="http://demo3.wpopal.com/exgym/wp-content/uploads/2014/06/about_us1.jpg"
                                                                                     class="" alt="banner"/></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kc-elm kc-css-949724 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                        <div class="kc_wrapper kc-col-inner-container">
                                                                            <div class="kc-elm kc-css-979187 kc-title-wrap no-border ">

                                                                                <h3 class="kc_title">{{$lists['about'][1]->title}}</h3>
                                                                            </div>

                                                                            <div class="kc-elm kc-css-427451 divider_line">
                                                                                <div class="divider_inner divider_line1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="kc-elm kc-css-619783 kc_text_block">
                                                                                {!!$lists['about'][1]->options->article->value !!}
                                                                            </div>
                                                                            <div id=" "
                                                                                 class="kc-elm kc-css-274792 kc_row kc_row_inner">
                                                                                <div class="kc-elm kc-css-726227 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                                    <div class="kc_wrapper kc-col-inner-container">
                                                                                        <div class="kc-elm kc-css-711636 kc-title-wrap no-border ">

                                                                                            <h3 class="kc_title">{{$lists['about'][2]->title}}</h3>
                                                                                        </div>

                                                                                        <div class="kc-elm kc-css-171864 divider_line">
                                                                                            <div class="divider_inner divider_line1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kc-elm kc-css-928399 kc_text_block">
                                                                                            {!!$lists['about'][2]->options->article->value !!}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kc-elm kc-css-366075 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                                    <div class="kc_wrapper kc-col-inner-container">
                                                                                        <div class="kc-elm kc-css-172671 kc-title-wrap no-border ">

                                                                                            <h3 class="kc_title">{{$lists['about'][3]->title}}</h3>
                                                                                        </div>

                                                                                        <div class="kc-elm kc-css-696246 divider_line">
                                                                                            <div class="divider_inner divider_line1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kc-elm kc-css-241548 kc_text_block">
                                                                                            {!!$lists['about'][3]->options->article->value !!}
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
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-933099 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-325435 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-6228"
                                                                     style="height:0; clear: both; width:100%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-277214 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-355680 kc_col-sm-3 kc_column kc_col-sm-3">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-46290 kc_counter_box">
                                                                    <span class="counterup">3900</span>
                                                                    <h4>There anyone</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kc-elm kc-css-315790 kc_col-sm-3 kc_column kc_col-sm-3">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-297479 kc_counter_box">
                                                                    <span class="counterup">1800</span>
                                                                    <h4>Happy clients</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kc-elm kc-css-533444 kc_col-sm-3 kc_column kc_col-sm-3">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-654995 kc_counter_box">
                                                                    <span class="counterup">1339</span>
                                                                    <h4>Award winning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kc-elm kc-css-691125 kc_col-sm-3 kc_column kc_col-sm-3">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-171454 kc_counter_box">
                                                                    <span class="counterup">3000</span>
                                                                    <h4>Team members</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-605558 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-276217 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-451026"
                                                                     style="height:0; clear: both; width:100%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-940086 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-923455 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div id=" "
                                                                     class="kc-elm kc-css-851040 kc_row kc_row_inner">
                                                                    <div class="kc-elm kc-css-500708 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                        <div class="kc_wrapper kc-col-inner-container">
                                                                            <div class="kc-elm kc-css-499737 kc-title-wrap no-border ">

                                                                                <h3 class="kc_title">{{$lists['about'][4]->title}}</h3>
                                                                            </div>

                                                                            <div class="kc-elm kc-css-581060 divider_line">
                                                                                <div class="divider_inner divider_line1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="kc-elm kc-css-317751 kc_text_block">
                                                                                {!!$lists['about'][4]->options->article->value !!}
                                                                            </div>
                                                                            <div class="kc-elm kc-css-311473"
                                                                                 style="height: 40px; clear: both; width:100%;"></div>
                                                                            <div class="kc-elm kc-css-160890 kc-title-wrap no-border ">

                                                                                <h3 class="kc_title">Contact Info</h3>
                                                                            </div>

                                                                            <div class="kc-elm kc-css-277038 divider_line">
                                                                                <div class="divider_inner divider_line1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="kc-elm kc-css-985123 kc_box_wrap ">
                                                                                <div class="opal-contact-us phone">
                                                                                    <div class="one-one"><i
                                                                                                class="fa fa-phone"></i>+0
                                                                                        123-456-7890
                                                                                    </div>
                                                                                </div>
                                                                                <div class="opal-contact-us emai">
                                                                                    <div class="one-one"><i
                                                                                                class="fa fa-comment-o"></i>info@example.com
                                                                                    </div>
                                                                                </div>
                                                                                <div class="opal-contact-us clock">
                                                                                    <div class="one-one"><i
                                                                                                class="fa fa-clock-o"></i>9:25
                                                                                        AM – 7:30 PM
                                                                                    </div>
                                                                                </div>
                                                                                <div class="opal-contact-us adress">
                                                                                    <div class="one-one"><i
                                                                                                class="fa fa-building"></i>United
                                                                                        States of America, 125 Remsen
                                                                                        St,
                                                                                        <text><br></text>
                                                                                        Brooklyn
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kc-elm kc-css-429683 kc_col-sm-6 kc_column_inner kc_col-sm-6">
                                                                        <div class="kc_wrapper kc-col-inner-container">
                                                                            <div class="kc_shortcode kc_single_image effect-v8">
                                                                                <img src="http://demo3.wpopal.com/exgym/wp-content/uploads/2014/06/about_us2.jpg"
                                                                                     class="" alt="banner"/></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="kc-elm kc-css-573623 kc_row">
                                                <div class="kc-row-container  kc-container">
                                                    <div class="kc-wrap-columns">
                                                        <div class="kc-elm kc-css-277130 kc_col-sm-12 kc_column kc_col-sm-12">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-745649"
                                                                     style="height:0; clear: both; width:100%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <!-- .entry-content -->
                                    </article>
                                    <!-- #post-## -->

                                </div>
                                <!-- #content -->
                            </div>
                            <!-- #primary -->

                        </div>
                        <!-- #main-content -->

                    </div>
                </section>
            </section>
            <!-- #main -->


            <!-- #colophon -->

        </div>
    </div>
    <!-- #page -->

@endsection
@section('script')
    <script type='text/javascript'
            src='http://demo3.wpopal.com/exgym/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript'
            src='http://demo3.wpopal.com/exgym/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript'
            src='http://demo3.wpopal.com/exgym/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.4'></script>
    <style>
        .row {
            display: flex !important;
        }
    </style>
    <script>
			function tpl() {

			}

			function tplJQ() {

				load.js('http://demo3.wpopal.com/exgym/wp-content/plugins/kingcomposer/includes/frontend/vendors/waypoints/waypoints.min.js?ver=2.6.17').then(function () {
					load.js('http://demo3.wpopal.com/exgym/wp-content/plugins/kingcomposer/assets/frontend/js/counter.up.min.js?ver=2.6.17');


				});
			}
    </script>
@endsection
