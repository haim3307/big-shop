@extends('layouts.master')
@section('head')
    <link rel='stylesheet' id='exgym-style-css'  href={{asset('css/specialTemp.css')}} type='text/css' media='all' />

    <style>
        .widget-woof .woof_container .widget h4, .widget .widget-title, .widget .widget-woof .woof_container h4, .widget .widgettitle {
            font-size: 18px;
            line-height: 22px;
            font-weight: 700;
            padding: 0 0 21px 0;
            margin: 0;
            margin-bottom: 32px !important;
            color: #000;
            font-family: Exo\ 2;
            text-transform: uppercase;
            border-bottom: 1px solid #ececec;
            position: relative;
        }
    </style>

@endsection
@section('content')
    <div id="page" class="hfeed site page-home-1" style="background-color:#fff;">
        <section id="main" class="site-main">
            <section id="main-container" class="container inner mainright">
                <div class="f-row">
                    @include('blog.side-bar')


                    <div id="main-content" class="main-content col-sm-12 col-xs-12 col-lg-9 col-md-9">
                        <div id="primary" class="content-area">
                            <div id="content" class="site-content" role="main">

                                <div class="g-row" style="grid-gap: 20px;">
                                    @foreach($posts as $post)
                                        <article id="post-{{$post->id}}" class="post-{{$post->id}} post type-post status-publish format-image has-post-thumbnail hentry category-accessories category-actions category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-html tag-media tag-php tag-web-design post_format-post-format-image g-col-12 g-col-md-6">
                                            <div class="content-full">

                                                <div class="content-image">


                                                    <a class="post-thumbnail" href="{{url('blog/post/'.$post->url)}}" aria-hidden="true">
                                                        <img width="1665" height="1143" src="{{asset('_img/posts/'.$post->main_img)}}" class="img-fluid" />
                                                    </a>


                                                    <div class="top-time">
                                                        <div class="entry-date" data-time="{{$post->created_at}}"><span class="date-month">Apr</span>,<span class="date-day">03</span>/<span class="date-border"></span><span class="date-year">2017</span></div>
                                                    </div>

                                                </div>

                                                <div class="content">
                                                    <div class="bottom blog">
                                                        <header class="entry-header">

                                                            <h3 class="entry-title"><a href="{{url('blog/post/'.$post->url)}}" rel="bookmark">{{$post->title}}</a></h3>
                                                            <div class="entry-meta">


                                                                <div class="comments-link"><a href="{{url('blog/post/'.$post->url.'#respond')}}" class="comments-link">No comments</a></div>



                                                                <div class="author "><a href="#admin" title="Posts by admin" rel="author">{{$post->author->name}}</a></div>


                                                                <div class="entry-category pull-left">
                                                                    in
                                                                    <ul class="post-categories">
                                                                        <li><a href="{{url("shop/category/$post->category->url")}}" rel="category tag">{{ucwords($post->category->name)}}</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="tag-link">
                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/" rel="tag">HTML</a>/<a href="http://demo3.wpopal.com/exgym/tag/media/" rel="tag">media</a>/<a href="http://demo3.wpopal.com/exgym/tag/php/" rel="tag">PHP</a>/<a href="http://demo3.wpopal.com/exgym/tag/web-design/" rel="tag">web design</a> </div>

                                                            </div>
                                                            <!-- .entry-meta -->

                                                            <div class="entry-content">
                                                                <p>{{$post->description}}</p>
                                                            </div>
                                                            <!-- .entry-content -->

                                                            <div class="readmore"><a href="{{url('blog/post/'.$post->url)}}"> read more</a></div>

                                                        </header>
                                                        <!-- .entry-header -->



                                                    </div>
                                                </div>
                                            </div>

                                        </article>
                                    @endforeach
                                </div>

                                <nav class="navigation paging-navigation clearfix" role="navigation">
                                    <h1 class="screen-reader-text">Posts navigation</h1>
                                    <div class="pagination loop-pagination">
                                        <span aria-current='page' class='page-numbers current'>1</span>
                                        <a class='page-numbers' href='http://demo3.wpopal.com/exgym/category/accessories/page/2/?sidebar_left=blog-sidebar-left'>2</a>
                                        <a class="next page-numbers" href="http://demo3.wpopal.com/exgym/category/accessories/page/2/?sidebar_left=blog-sidebar-left">Next &rarr;</a> </div>
                                    <!-- .pagination -->
                                </nav>
                                <!-- .navigation -->

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
        .f-row {
            display: flex !important;
            flex-wrap: wrap;
        }
        #addedToCartModal{
            display: none !important;
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
