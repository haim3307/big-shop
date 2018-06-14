@extends('layouts.master')
@section('title')
     {{$store_name}} | Page Not Found
@endsection
@section('head')
    <style>
        .btn-primary {
            color: #fff;
            background-color: #bf0d0d !important;
            border: none;
        }

        .btn-group-lg>.btn, .btn-lg {
            padding: 15px 20px;
            font-size: 18px;
            line-height: 1.33333;
            border-radius: 0;
        }
        /**
         * 6.11 404 Page
         * -----------------------------------------------------------------------------
         */
        .notfound-page {
            font-family: Exo\ 2;
            font-weight: 700;
            margin-bottom: 80px; }
        @media (max-width: 767px) {
            .notfound-page {
                margin-bottom: 50px; } }
        .notfound-page .number-not-found {
            line-height: normal;
            font-size: 400px;
            color: #f5f5f5;
            text-shadow: 2px 2px 0 #ddd;
            -webkit-text-shadow: 2px 2px 0 #ddd;
            -moz-text-shadow: 2px 2px 0 #ddd;
            -ms-text-shadow: 2px 2px 0 #ddd;
            -o-text-shadow: 2px 2px 0 #ddd; }
        @media (max-width: 991px) {
            .notfound-page .number-not-found {
                font-size: 280px; } }
        @media (max-width: 767px) {
            .notfound-page .number-not-found {
                font-size: 130px; } }
        @media (min-width: 768px) {
            .notfound-page .text-not-found {
                top: 50%;
                left: 50%;
                position: absolute;
                -webkit-transform: translateX(-50%) translateY(-50%);
                -ms-transform: translateX(-50%) translateY(-50%);
                -o-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%); } }
        .notfound-page .text-not-found h3 {
            font-size: 33px;
            color: #bf0d0d;
            margin: 0; }
        @media (max-width: 991px) {
            .notfound-page .text-not-found h3 {
                font-size: 24px; } }
        .notfound-page .text-not-found p {
            color: #0f0f0f;
            font-size: 16px;
            line-height: 24px;
        }
    </style>
    <link rel='stylesheet' id='arial-css'
          href='http://demo3.wpopal.com/exgym/wp-content/themes/exgym/css/font-arial.css?ver=1.0.0' type='text/css'
          media='all'/>


@endsection
@section('content')
    <section id="main" class="site-main">
        <section id="main-container" class="container inner clearfix notfound-page">
            <div class="f-row">
                <div id="main-content" class="main-content container inner">
                    <div id="primary" class="content-area">
                        <div id="content" class="site-content" role="main">

                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="number-not-found">404</div>
                                <div class="text-not-found">
                                    <h3>Oops! Page not found</h3>
                                    <p>The link you followed probably broken, or the page has been removed.</p>
                                </div>
                                <div class="page-action">
                                    <a class="btn btn-lg btn-primary" href="{{url('')}}">Back home</a>
                                </div>
                            </div>
                        </div><!-- #content -->
                    </div><!-- #primary -->
                </div><!-- #main-content -->





            </div>
        </section>
    </section>
@endsection
@section('script')
    <style>
        .row {
            display: flex !important;
        }
    </style>

@endsection
