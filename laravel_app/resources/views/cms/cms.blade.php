<!doctype html>
<html class="js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cms.inc.hook-script')
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="{{asset('js/lib/http_use.fontawesome.com_07b0ce5d10.js')}}" async></script>

    @php($mainCDN = 'https://cdnjs.cloudflare.com/ajax/libs/')
    @php($secondCDN = 'https://maxcdn.bootstrapcdn.com/')
    <style>
        .row {
            display: flex !important;
        }

        .g-row {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
        }
    </style>


    <script src="<?= $mainCDN ?>jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="<?= $mainCDN ?>popper.js/1.12.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $secondCDN ?>bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          crossorigin="anonymous">
    <script src="<?= $secondCDN ?>bootstrap/4.0.0-beta.2/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/lib/bootstrap-tagsinput.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">

    <script src="<?= $mainCDN ?>toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="<?= $mainCDN ?>toastr.js/latest/toastr.min.css">

    <link href="<?= $mainCDN ?>summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $mainCDN ?>summernote/0.8.9/font/summernote.ttf">
    <link rel="stylesheet" href="<?= $mainCDN ?>summernote/0.8.9/font/summernote.woff">
    <script src="<?= $mainCDN ?>summernote/0.8.9/summernote-bs4.min.js"></script>


    <link rel="stylesheet" href="<?= $secondCDN ?>font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $mainCDN ?>font-awesome/4.7.0/fonts/fontawesome-webfont.woff2">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></link>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/cms/cms.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/partials/items.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
			var CMSAppOBJ = {el: '#CMSApp', data: {}, methods: {}, computed: {}, filters: {}, watch: {}};
			var BASE_URL = '{{url('')}}';
			var token = $('meta[name="csrf-token"]').attr('content');
			Vue.prototype.url = BASE_URL;
    </script>
    <script>VueComponents()</script>
    @yield('head')

</head>
<body>
<div>
    <div class="flex-nowrap display-table g-row">
        @include('cms.layouts.side-nav')
        <div class="g-col-12 g-col-sm-10 g-col-lg-10 dtc d-grid"
             style="grid-template-rows: auto 1fr;padding: 0;height: 100vh;">
            @include('cms.layouts.header')
            <main style="overflow-y: scroll; padding-bottom: 50px;">
                @yield('content')
            </main>
            <footer id="admin-footer" style="margin: 0;" class="row justify-content-between">
                <div>Copyright &copy; <?= date("Y"); ?></div>
                <div>Big Shop CMS</div>
            </footer>

        </div>
    </div>
    <script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
					'X-Requested-With': 'XMLHttpRequest'
				}
			});
    </script>
    <script>
			$('.collpseableSide').children().on('click', function (e) {
				e.stopPropagation();
			});
			$('.link').on('click', function () {
				var $clicked = $(this).find('.collpseableSide');
				$('.collpseableSide').not($clicked).slideUp(500);
				$clicked.slideToggle(500);
			});
    </script>

    <script>
        @if(Session::get('cms_status') == 1)
				toastr.success('{{Session::get('cms_m')}}');
        @elseif(Session::get('cms_status') === -1)
				toastr.error('{{Session::get('cms_m')}}');
        @elseif(Session::get('cms_status') === 0)
				toastr.info('{{Session::get('cms_m')}}');
        @endif
    </script>
</div>
@yield('scripts')
@stack('scripts')
@stack('styles')
{!! Toastr::render() !!}

</body>
</html>
