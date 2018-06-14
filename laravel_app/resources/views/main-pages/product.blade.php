@extends('layouts.master')
@section('content')

    <div class="container-1112">
        <div class="productPage">
            <header>
                @include('site-route-nav.views.general')
            </header>
            <link rel="stylesheet" href="app.min.css">
            <main>
                <div class="itemStage f-row">
                    <div class="productImages col-md-6">
                        <div class="productImgStage p-md-4">
                            <div style="position: absolute; top: 50px; left: 38px; z-index: 2;">
                                <img src="{{asset('_img/layout/price.png')}}" alt="">
                                <p class="text-white" style="position: relative; top: -50px; left: 20px;">${{$item->price}}</p>
                            </div>
                            <div class="carousel carousel-main" style="border: 1px lightgrey solid;"
                                 data-flickity='{"pageDots": false,"imagesLoaded": true}'>
                                @for ($i = 0; $i < 1; $i++)

                                    <div class="carousel-cell">
                                        <img src="{{isset($item->main_img)?asset('_img/products/'. $category->name .'/'.$item->main_img):'http://via.placeholder.com/1100x700?text=No Product Image'}}"
                                             class="img-fluid" alt="">
                                    </div>
                                @endfor

                            </div>

                        </div>
                        <div class="productImagesMenu" style="display: none;">
                            @isset($item->main_img)


                                {{--                                <div class="carousel carousel-nav"
                                                                     data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false,"prevNextButtons": false
                                 }'>
                                                                    @for ($i = 0; $i < 4; $i++)
                                                                        <div class="carousel-cell">
                                                                            <div class="productImageSquare">
                                                                                <img class="img-fluid"
                                                                                     src="{{asset('_img/products/'. $category->name .'/'.$item->main_img)}}"
                                                                                     alt="">
                                                                            </div>
                                                                        </div>
                                                                    @endfor

                                                                </div>--}}

                            @else
                                <h4>No Product Images Available</h4>
                            @endisset

                        </div>
                    </div>
                    <div class="productDesc col-md-6">
                        <div class="productTitle">
                            <h2 class="text-capitalize">{{$item->title}}</h2>
                            <div style="display: flex; justify-content: space-between;">
                                <p>Posted in <span class="productAlert ">{{$category->name}}</span></p>
                            </div>
                            <div><star-rating :show-rating="false" :rating="{{$item->rating}}" :round-start-rating="false" :star-size="20" :read-only="true"></star-rating></div>
                        </div>
                        <hr>
                        <div class="innerProductDesc">
                            <div>{!! $item->description !!}</div>
                            @if($item->stock)
                                <p style="padding: 17px 0 22px 0;">In Stock - <span>{{$item->stock}}</span> available
                                </p>
                            @else
                                <p class="text-danger">Out Of Stock!</p>
                            @endif
                            <div class="callToAction f-row">
                                <input type="number" min="1" value="1"
                                       style="text-align: center; margin-right: 14px; width: 46px;">
                                <div @include('inc.print-object',['product'=>(object) $item->toArray()]) class="addToCartB buyPageButtons d-flex">
                                    <button class="btn allCentered addToCartProductPage"
                                            style="flex-basis: 173px; padding: 0; justify-content: stretch; margin-right: 10px; border-radius: 0">
                                        <div class="allCentered"
                                             style="height: 38px; width: 42px; background-color: rgb(247, 24, 24);">
                                            <img src="{{asset('_img/Shopping Cart 3.png')}}" alt=""></div>
                                        <span class="allCentered btnTitle"
                                              style=" background-color: #e1e1e1; padding: 0 11px;">Add to cart</span>
                                    </button>
                                    <button class="btn allCentered buyNow"
                                            style="flex-basis: 173px; padding: 0; justify-content: stretch; border-radius: 0">
                                        <div class="allCentered"
                                             style="height: 38px; width: 42px; background-color: rgb(247, 24, 24);">
                                            <img src="{{asset('_img/Shopping Cart 3.png')}}" alt=""></div>
                                        <span class="allCentered buyNow"
                                              style=" background-color: #e1e1e1; padding: 0 11px;">Buy Now</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="publicTabs">
                    <nav style="background-color: #252525; border-bottom: 4px solid #f71818; border-radius: 10px;
;">
                        <ul style="display: flex; color: white;">
                            <li class="activeTab">Reviews</li>
                            <li>Description</li>
                        </ul>
                    </nav>

                    <div class="innerPublicTabs">

                        <h2 style="margin: 30px 0 19px 0;">Reviews</h2>
                        <div>

                            @foreach($reviews as $review)
                                <div class="f-row review">
                                    <div style="width: 80px; height: 80px;" class="col-md-2">
                                        <img style=" border: 1px lightgrey solid;" class="img-res" width="80" src="{{$review->user->profile_img}}" alt=""></div>
                                    <div style="font-family: Arial; background: radial-gradient(ellipse at center, #fafafa 0%,#eeeeee 100%); "
                                         class="col-md-10 reviewContent productConShadow">
                                        <div class="f-row justify-content-between">
                                            <h3 class="reviewerName">{{"{$review->user->first_name} {$review->user->last_name}"}}</h3>
                                            <span class="reviewRating"><star-rating :show-rating="false" :rating="5" :round-start-rating="false" :star-size="20" :read-only="true"></star-rating></span>
                                        </div>
                                        <p style="color:  #777777;">
                                            {{$review->content}}
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                            @if (Auth::check())
                                    <section class="addComment d-grid productConShadow">
                                        <h2 class="g-col-md-12" style="color:  #f71818;">ADD COMMENT
                                            <hr style="margin: 10px 0;">
                                        </h2>
                                        <div class="input-g-group d-grid g-col-md-3">
                                            <label for="commentName">Name (<span class="myAlert">required</span>):</label>
                                            <input type="text" id="commentName">
                                        </div>
                                        <div class="input-g-group d-grid g-col-md-3">
                                            <label for="commentEmail">Email (<span class="myAlert">required</span>):</label>
                                            <input type="text" id="commentEmail">
                                        </div>
                                        <div class="input-g-group d-grid g-col-md-3">
                                            <label for="commentRating">Rating (<span class="myAlert">required</span>):</label>
                                            <star-rating :show-rating="false" :rating="3" :round-start-rating="false" :star-size="20" ></star-rating>
                                        </div>
                                        <div class="input-g-group d-grid g-col g-col-md-12"
                                             style="grid-template-rows: 30px 1fr;">
                                            <label for="commentContent">Your comment (<span
                                                        class="myAlert">required</span>):</label>
                                            <textarea style="min-height: 93px;" id="commentContent"></textarea>
                                        </div>
                                    </section>
                                @else
                                    <p>You have to <a href="{{route('login')}}">login</a> in order to add a review</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-grid relatedProducts">
                    <div class="innerRelatedProducts">
                        <div class="threeDTitle allCentered" style=" position: relative;">
                            <img src="{{asset('_img/layout/titleBarGrey.png')}}" alt="" style="width: 100%; max-width: 224px;  position: relative;top: -10px;">
                            <h2 class="h5 text-center">
                                <span>Related Products</span>
                                <div class="shadowTringle" id="sta"></div>
                                <div class="shadowTringle" id="stb"></div>
                            </h2>
                        </div>
                    </div>
                    @if(count($relatedProducts))
                        <div style="background-color: #ffffff; padding: 10px;" class="f-row">
                            @foreach ($relatedProducts as $frameItem)
                                <div class="col-sm-6 col-md-3" style="cursor: pointer;">
                                    @include('items.frame-item')
                                </div>
                            @endforeach
                        </div>

                    @else
                        <p class="text-center display-4 allCentered"> No Related Products.. </p>
                    @endif
                </div>
            </main>
        </div>
    </div>
@endsection
@section('style')
    <style>
        .relatedProducts .dragItem {
            width: initial;
        }

        .relatedProducts .frameItem > h3, .relatedProducts .frameItem > .frameItemTitle {
            word-wrap: break-word;
            overflow: hidden;
        }
        .innerRelatedProducts{
            height: 39px;
            background-color: #eeeeee;
            position: relative;
            border-bottom: 3px solid #c9c9c9;
        }
        .innerRelatedProducts .threeDTitle h2{
            height: 100%;
            display: block;
            position: absolute;
            top: 5px;
        }

        @media(min-width: 810px) {
            .innerRelatedProducts .threeDTitle{
                max-width: 203px;
                margin-left: 24px;
            }

        }
        @media(max-width: 1013px) {

        }
        .SiteRouteWay > .sectionA {
            padding: 0;
        }

        .SiteRouteWay {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .orderCateBy, .grid-order {
            display: none;
        }

        /*carousel*/

        .itemStage .carousel-cell {
            width: 100%;
            height: 400px;
            margin-right: 10px;
            border-radius: 5px;
            counter-increment: carousel-cell;
        }

        .itemStage .carousel-nav .carousel-cell {
            height: 80px;
            width: 100px;
            border: 3px inset transparent;
        }

        .itemStage .carousel-nav .carousel-cell:before {
            font-size: 50px;
            line-height: 80px;
        }

        .itemStage .carousel-nav .carousel-cell.is-nav-selected {
            border: 3px inset #F52323;
            overflow: hidden;
        }

    </style>
@endsection
@section('script')
    <script>
			function tplFlickJQ() {
				$('.productImgStage .carousel-main').width($('.productImages').width() - 70);
				$('.productImgStage .carousel-main-nav').width($('.productImages').width() - 70);
				$(window).on('resize', function () {
					$('.productImgStage .carousel-main').width($('.productImages').width() - 70);
					$('.productImgStage .carousel-main-nav').width($('.productImages').width() - 70);

				});
				$('.carousel-main').flickity({
					pageDots: false,
					imagesLoaded: true,
					"prevNextButtons": false
				});
				/*
                // 2nd carousel, navigation
                                $('.carousel-nav').flickity({
                                    asNavFor: '.carousel-main',
                                    contain: true,
                                    pageDots: false
                                });*/
			}
    </script>
@endsection
