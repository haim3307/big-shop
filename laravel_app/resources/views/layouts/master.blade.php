<!doctype html>
<html>
<head>
    {{--Sports, Fitness & Outdoors--}}
    <meta charset="utf-8">
    <meta name="description" content="{{$metaDesc??$defaultMetaDesc}}">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    @php
        $brands = \App\Brand::all()->reverse();
        $allCategories = \App\Category::take(15)->get();
        $menus = \App\Menu::with('items')->get()->keyBy('url');
        $menus->transform(function ($menu){
            $menu->items->transform(function ($item,$key) use ($menu){
                $item->calc_url = $item->customUrl();
                if($item->calc_url) return $item;
            });
            return $menu;
        });
    @endphp
    {{--
        <meta name="keywords" content="sports store,sport,camping,playground,JavaScript">
    --}}
    @if(isset($title))
        @isset($page->title)
            <title>{{$title.ucwords($page->title)}}</title>
        @else
            <title>{{$title}}</title>
        @endisset
    @else
        <title>@yield('title')</title>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <script>
			function ready(fn) {
				if (document.readyState != 'loading') {
					fn();
				} else if (document.addEventListener) {
					document.addEventListener('DOMContentLoaded', fn);
				} else {
					document.attachEvent('onreadystatechange', function () {
						if (document.readyState != 'loading')
							fn();
					});
				}
			}
    </script>
    <script>
			var localList = JSON.parse(localStorage.getItem('cartItems') || '[]').filter(function (item) {
				return item.id;
			}).map(function (item) {
				if (item.main_category && typeof item.main_category === 'string') item.main_category = JSON.parse(item.main_category);
				return item;
			});
			localStorage.setItem('cartItems',localList);


    </script>
    @include('inc.load-script')
    <script>
			function tpl() {
			}

			function tplVue() {
			}

			function tplJQ() {
			}

			function tplJQBT() {
			}

			function tplJQUI() {
			}

			function vueShopCart() {
			}

			function tplFlick() {

			}

			function tplFlickJQ() {

			}

			var addonsJQ = [];// array of own plugin functions
    </script>
    <script>
			window.url = '{{url('')}}';
			window.token = '{{ csrf_token() }}';
			window.categoriesWithFilters = {!! \App\Category::with('filters')->get() !!};
			console.log(categoriesWithFilters);
			window.BASEURL = '{{url('')}}';
			window.BASE_URL = window.BASEURL;

    </script>

    <script>
			var shopAppOBJ = {el: '#shopApp', data: {}, methods: {}, computed: {}, filters: {}};
    </script>
    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
    <link href="{{ asset('css/styles.php')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.1.1/dist/flickity.min.css">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" async></script>
    <script src="{{asset('js/lib/http_use.fontawesome.com_07b0ce5d10.js')}}" async></script>


    <link rel='stylesheet' id='exo-2-css'
          href='//fonts.googleapis.com/css?family=Exo+2%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;subset=latin&#038;ver=2.6.17'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='exo-css'
          href='//fonts.googleapis.com/css?family=Exo%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;subset=latin-ext%2Clatin%2Cvietnamese&#038;ver=2.6.17'
          type='text/css' media='all'/>
    <style>
        .carousel-cell {
            opacity: 0;
            transition: 1.5s opacity;
        }

        #page {
            padding-top: 30px;

        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
    @stack('styles')
    <style type="text/css">
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .goog-te-gadget-icon {
            display: none !important;
        }

        .goog-te-menu-value {
            display: flex;
            flex-flow: row-reverse;
        }
    </style>
</head>
<body class="kc-css-system" style="top: 0 !important;">

<div class="all_site" id="shopApp">
    @include('layouts.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    <added-to-cart-modal :product="product"></added-to-cart-modal>
    <quick-product-view-modal :product="quickProduct"></quick-product-view-modal>

</div>
@if(Request::server('HTTP_HOST') != 'localhost:8000')
    {{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://use.fontawesome.com/07b0ce5d10.js" async></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>--}}

@endif
@include('inc.lib-js')
<script>
	function onImgLoad(selector, callback) {
		$(selector).each(function () {
			if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
				callback.apply(this);
			}
			else {
				$(this).on('load', function () {
					callback.apply(this);
				});
			}
		});
	}

</script>

@yield('script')
@include('scripts.vue-cart-script')
@include('inc.load-vue')
@yield('style')
<style>
    .topBarNav a:hover {
        color: inherit !important;
    }
</style>
@stack('scripts')
@stack('styles')
<style>
    .goog-te-gadget {
        display: block !important;
    }
</style>
<style>
    .quickViewB{
        height: 46px;
        width: 46px;
        line-height: 44px;
        background: transparent;
        color: #fff;
        font-size: 16px;
        display: inline-flex;
        text-align: center;
        border: 0 !important;
        margin: 0;
        align-items: center;
        justify-content: center;
        border-radius: 100%;

    }
    .quickViewB:hover{
        border-radius: 100%;
    }

    .quickViewB i{
        position: relative;
        top: -3px;
    }
    .quickViewWrap{
        background-color: rgba(191, 13, 13, .75);
        border-radius: 100%;
    }
</style>
</body>
</html>