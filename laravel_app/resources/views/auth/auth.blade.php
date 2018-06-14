@extends('layouts.master')
@section('content')
    <div style="background-image: url({{asset('_img/beach-832346_1920.jpg')}});">
        @include('auth.errors')
        @yield('content')
    </div>
@endsection
@section('script')
   {{-- <script>
			window.fbAsyncInit = function () {
				FB.init({
					appId: '386001925234856',
                    '560ce6aae5aae9f8b9c75ed5f1a8131b',
					cookie: true,
					xfbml: true,
					version: '{latest-api-version}'
				});

				FB.AppEvents.logPageView();

			};

			(function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
    </script>--}}
@endsection