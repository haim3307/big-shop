@extends('layouts.master')
@section('title')
    {{$store_name}} | Contact Us
@endsection
@section('head')

    <link rel='stylesheet' id='kc-general-css' href={{asset('css/specialGeneral.css')}} type='text/css' media='all'/>

    <style type="text/css" id="kc-css-general">
        .kc-off-notice {
            display: inline-block !important;
        }

        .kc-container {
            max-width: 1200px;
        }

        .opal-contact-us .one-one {
            position: relative;
            padding-left: 30px;
        }

        .opal-contact-us .one-one .fa {
            position: absolute;
            top: 0;
            left: 0;
            line-height: 42px;
            color: #bf0d0d;
        }

        @media (max-width: 991px) {
            .opal-contact-us .one-one .fa {
                line-height: 30px;
            }
        }

        .wpcf7-form-control.btn {
            height: 45px;
            line-height: 34px;
            width: 100%;
            font-size: 16px;
        }


    </style>
    <style type="text/css" id="kc-css-render">

        @media only screen and (min-width: 1000px) and (max-width: 5000px) {
            body.kc-css-system .kc-css-91913 {
                width: 33.33%;
            }

            body.kc-css-system .kc-css-757254 {
                width: 33.33%;
            }

            body.kc-css-system .kc-css-618507 {
                width: 33.33%;
            }

            body.kc-css-system .kc-css-746522 {
                width: 24.69%;
            }

            body.kc-css-system .kc-css-507320 {
                width: 50.53%;
            }

            body.kc-css-system .kc-css-320150 {
                width: 24.76%;
            }

            body.kc-css-system .kc-css-304557 {
                width: 16.91%;
            }

            body.kc-css-system .kc-css-141762 {
                width: 66.23%;
            }

            body.kc-css-system .kc-css-328393 {
                width: 16.84%;
            }
        }

        body.kc-css-system .kc-css-702426 {
            background: transparent url(http://demo3.wpopal.com/exgym/wp-content/uploads/2014/03/contact.jpg) center center/cover no-repeat fixed;
            padding-top: 110px;
            padding-bottom: 100px;
        }

        body.kc-css-system .kc-css-828788.kc_title, body.kc-css-system .kc-css-828788 .kc_title, body.kc-css-system .kc-css-828788 .kc_title a.kc_title_link {
            color: #ffffff;
            font-family: Exo 2;
            font-size: 22px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0;
        }

        body.kc-css-system .kc-css-292836 .divider_inner {
            border-color: #bf0d0d;
            border-style: solid;
            width: 50px;
            border-width: 4px;
        }

        body.kc-css-system .kc-css-292836 {
            margin-top: 2px;
            margin-bottom: 16px;
        }

        body.kc-css-system .kc-css-153174 {
            color: #ffffff;
            font-size: 15px;
            font-weight: 300;
            text-align: left;
            text-transform: capitalize;
            line-height: 36px;
        }

        body.kc-css-system .kc-css-679393.kc_title, body.kc-css-system .kc-css-679393 .kc_title, body.kc-css-system .kc-css-679393 .kc_title a.kc_title_link {
            color: #ffffff;
            font-family: Exo 2;
            font-size: 22px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0;
        }

        body.kc-css-system .kc-css-391219 .divider_inner {
            border-color: #bf0d0d;
            border-style: solid;
            width: 50px;
            border-width: 4px;
        }

        body.kc-css-system .kc-css-391219 {
            margin-top: 2px;
            margin-bottom: 16px;
        }

        body.kc-css-system .kc-css-612566 {
            color: #ffffff;
            font-size: 15px;
            font-weight: 300;
            text-align: left;
            text-transform: capitalize;
            line-height: 36px;
        }

        body.kc-css-system .kc-css-138005.kc_title, body.kc-css-system .kc-css-138005 .kc_title, body.kc-css-system .kc-css-138005 .kc_title a.kc_title_link {
            color: #ffffff;
            font-family: Exo 2;
            font-size: 22px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0;
        }

        body.kc-css-system .kc-css-829695 .divider_inner {
            border-color: #bf0d0d;
            border-style: solid;
            width: 50px;
            border-width: 4px;
        }

        body.kc-css-system .kc-css-829695 {
            margin-top: 2px;
            margin-bottom: 16px;
        }

        body.kc-css-system .kc-css-9751 {
            color: #ffffff;
            font-size: 15px;
            font-weight: 300;
            text-align: left;
            text-transform: capitalize;
            line-height: 36px;
        }

        body.kc-css-system .kc-css-496842.kc_title, body.kc-css-system .kc-css-496842 .kc_title, body.kc-css-system .kc-css-496842 .kc_title a.kc_title_link {
            color: #2c2c2c;
            font-family: Exo 2;
            font-size: 32px;
            font-weight: 700;
            line-height: 24px;
            text-transform: uppercase;
            text-align: center;
            margin-top: 100px;
            margin-bottom: 0;
        }

        body.kc-css-system .kc-css-622355 .divider_inner {
            border-color: #bf0d0d;
            border-style: solid;
            width: 65px;
            border-width: 4px;
        }

        body.kc-css-system .kc-css-622355 {
            text-align: center;
            margin-top: 2px;
            margin-bottom: 25px;
        }

        body.kc-css-system .kc-css-507320 {
            margin-bottom: 40px;
        }

        body.kc-css-system .kc-css-227663, body.kc-css-system .kc-css-227663 p {
            font-size: 18px;
            line-height: 24px;
            font-weight: 300;
            text-align: center;
        }

        body.kc-css-system .kc-css-227663 p {
            margin-bottom: 0;
        }

        body.kc-css-system .kc-css-320150 {
            display: none;
        }

        body.kc-css-system .kc-css-561405 {
            margin-bottom: 42px;
        }

        @media only screen and (max-width: 1024px) {
            body.kc-css-system .kc-css-702426 {
                padding-top: 50px;
                padding-bottom: 50px;
            }

            body.kc-css-system .kc-css-91913 {
                padding-left: 15px;
            }

            body.kc-css-system .kc-css-153174 {
                font-size: 14px;
                line-height: 30px;
            }

            body.kc-css-system .kc-css-757254 {
                padding-left: 15px;
            }

            body.kc-css-system .kc-css-612566 {
                font-size: 14px;
                line-height: 30px;
            }

            body.kc-css-system .kc-css-618507 {
                padding-left: 15px;
            }

            body.kc-css-system .kc-css-9751 {
                font-size: 14px;
                line-height: 30px;
            }

            body.kc-css-system .kc-css-496842.kc_title, body.kc-css-system .kc-css-496842 .kc_title, body.kc-css-system .kc-css-496842 .kc_title a.kc_title_link {
                font-size: 28px;
                margin-top: 50px;
            }

            body.kc-css-system .kc-css-227663, body.kc-css-system .kc-css-227663 p {
                font-size: 14px;
            }

            body.kc-css-system .kc-css-561405 {
                margin-bottom: 15px;
            }
        }

        @media only screen and (max-width: 999px) {
            body.kc-css-system .kc-css-828788.kc_title, body.kc-css-system .kc-css-828788 .kc_title, body.kc-css-system .kc-css-828788 .kc_title a.kc_title_link {
                font-size: 20px;
                line-height: 28px;
            }

            body.kc-css-system .kc-css-679393.kc_title, body.kc-css-system .kc-css-679393 .kc_title, body.kc-css-system .kc-css-679393 .kc_title a.kc_title_link {
                font-size: 20px;
                line-height: 28px;
            }

            body.kc-css-system .kc-css-138005.kc_title, body.kc-css-system .kc-css-138005 .kc_title, body.kc-css-system .kc-css-138005 .kc_title a.kc_title_link {
                font-size: 20px;
                line-height: 28px;
            }

            body.kc-css-system .kc-css-746522 {
                display: none;
            }

            body.kc-css-system .kc-css-507320 {
                margin-bottom: 30px;
                width: 100%;
            }
        }

        @media only screen and (max-width: 767px) {
            body.kc-css-system .kc-css-757254 {
                margin-top: 30px;
            }

            body.kc-css-system .kc-css-618507 {
                margin-top: 30px;
            }

            body.kc-css-system .kc-css-227663, body.kc-css-system .kc-css-227663 p {
                font-size: 15px;
                line-height: 24px;
            }
        }
    </style>
@endsection
@section('content')
    <div id="page" class="hfeed site page-home-1" style="background-color:#fff; padding-top: 0;">

        <section id="main" class="site-main" style="background-color: #ffffff">
            <section id="main-container" class="inner">
                <div class="row">
                    <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
                        <div id="primary" class="content-area">
                            <div id="content" class="site-content" role="main">


                                <article id="post-24" class="post-24 page type-page status-publish hentry">
                                    <div class="entry-content-page">
                                        <div class="kc_clfw"></div>
                                        <section class="kc-elm kc-css-702426 kc_row">
                                            <div class="kc-row-container  kc-container">
                                                <div class="kc-wrap-columns">
                                                    @foreach($lists['contact-us'] as $item)
                                                        <div class="kc-elm kc-css-91913 kc_col-sm-4 kc_column kc_col-sm-4">
                                                            <div class="kc-col-container">
                                                                <div class="kc-elm kc-css-828788 kc-title-wrap no-border ">

                                                                    <h3 class="kc_title">{!! $item->title !!}</h3>
                                                                </div>

                                                                <div class="kc-elm kc-css-292836 divider_line">
                                                                    <div class="divider_inner divider_line1">
                                                                    </div>
                                                                </div>
                                                                <div class="kc-elm kc-css-153174 kc_box_wrap ">
                                                                    <div class="opal-contact-us phone">
                                                                        <div class="one-one"><i class="fa fa-phone"></i>+0
                                                                            {{$item->options->phone->value}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="opal-contact-us emai">
                                                                        <div class="one-one"><i
                                                                                    class="fa fa-comment-o"></i>{{$item->options->email->value}}

                                                                        </div>
                                                                    </div>
                                                                    <div class="opal-contact-us clock">
                                                                        <div class="one-one"><i
                                                                                    class="fa fa-clock-o"></i>{!! $item->options->opening->value !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="opal-contact-us adress">
                                                                        <div class="one-one"><i
                                                                                    class="fa fa-building"></i>{!! $item->options->adress->value !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        <section class="kc-elm kc-css-486192 kc_row">
                                            <div class="kc-row-container kc-container">
                                                <div class="kc-wrap-columns">
                                                    <div class="kc-elm kc-css-100872 kc_col-sm-12 kc_column kc_col-sm-12">
                                                        <div class="kc-col-container">
                                                            <div class="kc-elm kc-css-496842 kc-title-wrap no-border ">

                                                                <h3 class="kc_title">Contact Form</h3>
                                                            </div>

                                                            <div class="kc-elm kc-css-622355 divider_line">
                                                                <div class="divider_inner divider_line1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="kc-elm kc-css-504866 kc_row">
                                            <div class="kc-row-container  kc-container">
                                                <div class="kc-wrap-columns">
                                                    <div class="kc-elm kc-css-746522 kc_col-sm-3 kc_column kc_col-sm-3">
                                                        <div class="kc-col-container"></div>
                                                    </div>
                                                    <div class="kc-elm kc-css-507320 kc_col-sm-6 kc_column kc_col-sm-6">
                                                        <div class="kc-col-container">
                                                            <div class="kc-elm kc-css-227663 kc_text_block"><p>
                                                                    We thrive when coming up with innovative ideas but
                                                                    also
                                                                    understand that a smart concept should be supported
                                                                    with
                                                                    measurable results.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kc-elm kc-css-320150 kc_col-sm-3 kc_column kc_col-sm-3">
                                                        <div class="kc-col-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="kc-elm kc-css-561405 kc_row">
                                            <div class="kc-row-container  kc-container">
                                                <div class="kc-wrap-columns">
                                                    <div class="kc-elm kc-css-304557 kc_col-sm-2 kc_column kc_col-sm-2">
                                                        <div class="kc-col-container"></div>
                                                    </div>
                                                    <div class="kc-elm kc-css-141762 kc_col-sm-8 kc_column kc_col-sm-8">
                                                        @if(Session::has('thankYouContact'))
                                                            <p class="bold text-center">
                                                                <strong>{{Session::get('thankYouContact')}}</strong></p>
                                                        @endif
                                                        <div class="kc-col-container">
                                                            <div class="kc-elm kc-css-977835 kc_text_block">
                                                                <div role="form" class="wpcf7" id="wpcf7-f4-p24-o1"
                                                                     lang="en-US" dir="ltr">
                                                                    <div class="screen-reader-response"></div>
                                                                    <form action=""
                                                                          method="post" class="wpcf7-form"
                                                                          novalidate="novalidate">
                                                                        {{csrf_field()}}
                                                                        <div class="form-group">
                                                                        <span class="wpcf7-form-control-wrap text-144"><input
                                                                                    type="text" name="name" value=""
                                                                                    size="40"
                                                                                    class="wpcf7-form-control wpcf7-text form-control"
                                                                                    id="contact_subject"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Your name"></span>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6 col-sm-12">
                                                                            <span class="wpcf7-form-control-wrap text-799"><input
                                                                                        type="text" name="email"
                                                                                        value="" size="40"
                                                                                        class="wpcf7-form-control wpcf7-text form-control"
                                                                                        id="your_email"
                                                                                        aria-invalid="false"
                                                                                        placeholder="Email"></span>
                                                                            </div>
                                                                            <div class="form-group col-md-6 col-sm-12">
                                                                            <span class="wpcf7-form-control-wrap email-257"><input
                                                                                        type="email" name="phone"
                                                                                        value="" size="40"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control"
                                                                                        id="your_phone"
                                                                                        aria-invalid="false"
                                                                                        placeholder="Phone"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group area-content">
                                                                        <span class="wpcf7-form-control-wrap textarea-552"><textarea
                                                                                    name="comment" cols="40"
                                                                                    rows="10"
                                                                                    class="wpcf7-form-control wpcf7-textarea form-control"
                                                                                    id="your_message"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Comment"></textarea></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="submit" value="Submit"
                                                                                   class="form-control submit btn btn-primary">
                                                                            <span class="ajax-loader"></span>
                                                                        </div>
                                                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kc-elm kc-css-328393 kc_col-sm-2 kc_column kc_col-sm-2">
                                                        <div class="kc-col-container"></div>
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
