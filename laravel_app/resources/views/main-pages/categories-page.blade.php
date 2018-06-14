@extends('layouts.master')
@section('content')
    <div class="m-0-auto" style=" padding-top: 21px;max-width: 1400px;">
        <form class="categoryPage" id="app">
            @include('site-route-nav.views.categories-nav')
            <nav class="filters">
                <div id="filterActions" class="d-grid-row grid-col-2 text-center" style="height: 80px;">
                    <button id="expendAll" class="allCentered materialButton">Expand All</button>
                    <button id="minimizeAll"
                            class="allCentered materialButton">Minimize All
                    </button>
                </div>
                <ul class="d-grid filtersUl" style="    padding-bottom: 57px;">
                    <li>
                        <div class="filterUnit" style=" background-color: #f6f6f6;">
                            <h4 class="toggleFilterDrop"><i class="fa fa-angle-down"
                                                            style="margin-right: 10px;"></i><strong>Price</strong></h4>
                            <div class="priceRangeFilter dropFilter">
                                <div class="input-group justify-content-around">
                                    <label for="amountMin" class="rangeInputs allCentered ui-corner-all">
                                        <input class="text-center" value="{{old('min-price')}}" name="min-price"
                                               type="text" id="amountMin" placeholder="Min">
                                    </label>
                                    <label for="amountMax" class="rangeInputs allCentered ui-corner-all">
                                        <strong>$</strong>
                                        <input class="text-center" value="{{old('max-price')}}" name="max-price"
                                               type="text" id="amountMax" placeholder="Max">
                                    </label>
                                </div>
                                <div id="slider-range"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <nav class="sideSubCategoryMenu">
                            <h4 class="toggleFilterDrop filterUnit" style="    background-color: #f9f9f9;"><i
                                        class="fa fa-angle-down"
                                        style="margin-right: 10px;"></i><strong>Category</strong></h4>
                            <ul class="dropFilter">
                                {{--                                <li class="{{$selected_sub_category->name == 'all' ? 'selectedSubCategory':''}}">
                                                                    <a href="{{url('shop/'.$category->name.'/')}}">View All</a>
                                                                </li>--}}
                                @foreach($categories as $menu_category)
                                    <li class="{{$selected_category->id == $menu_category->id? 'selectedSubCategory':''}}">
                                        <a href="{{url('shop/'.$menu_category->url)}}">{{$menu_category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </li>

                    {{--                   <li>
                                           <div class="filterUnit">
                                               <h4 class="toggleFilterDrop"><i class="fa fa-angle-down"
                                                                               style="margin-right: 10px;"></i><strong>Color</strong></h4>
                                               <div class="colorsFilter dropFilter">
                                                   <ul>
                                                       @php($allColors = [(Object)['hex'=>'ffffff'],(Object)['hex'=>'e5e5e5'],(Object)['hex'=>'feb312'],(Object)['hex'=>'f36b26'],(Object)['hex'=>'e7352b'],(Object)['hex'=>'8d429f'],(Object)['hex'=>'3a54d6'],(Object)['hex'=>'23a5e8'],(Object)['hex'=>'5bb22c']])
                                                       @foreach($allColors as $allColor)
                                                           <li>
                                                               <input id="checkBox{{$allColor->hex}}" name="check-box-{{$allColor->hex}}"
                                                                      class="hiddenCheckbox"
                                                                      type="checkbox"
                                                                      @if(old('check-box-'.$allColor->hex) == 'on') checked @endif>
                                                               <label for="checkBox{{$allColor->hex}}"
                                                                      class="allCentered customCheckbox"
                                                                      style="background-color: {{'#'.$allColor->hex}}; border-radius: 100%;
                                                                              width: 100%;height: 100%; margin-bottom: 0">
                                                                   <img src="{{asset('_img/Shape_21.png')}}"
                                                                        class="@if(old('check-box-'.$allColor->hex) == 'on') d-block @else d-none-unimportant @endif"
                                                                        alt="">
                                                               </label>
                                                           </li>
                                                       @endforeach
                                                   </ul>
                                               </div>
                                           </div>
                                       </li>
                   --}}
                </ul>

            </nav>
            <main class="d-grid" style="grid-template-rows: 1fr auto;">
                <div class="items" style="min-height: 95vh">
                    <ul class="grid-items-4" v-if="items && items.length && itemsAvail">
                        @foreach($main_items as $product)
                            @include('items.cate-item-r',['product'=>$product])
                        @endforeach
                    </ul>
                    <h2 class="noItems" v-else-if="!items.length && searchText" > NO PRODUCTS
                        Found</h2>
                    <h2 class="noItems hide" v-else style="display: none; transition: 1.2s all;"> NO PRODUCTS
                        AVAILABLE</h2>

                </div>
                <div style="padding: 15px;">{!! $main_items->appends(Request::except('page'))->render("pagination::bootstrap-4") !!}</div>
            </main>
        </form>

    </div>

@endsection
@section('script')
    <script>
			var selectedCategory = '{{$category->url}}';
			var selectedSubCategory = '{{$category->url}}';
			var items = {!! $main_items->toJson()??[] !!};
			categoryImgRoute = '{{"_img/products/$category->url/"}}';
    </script>
    <script>
			function tplJQ() {
				if (!items.data.length) $('.noItems').css('display', 'block !important').removeClass('hide').css('opacity', 1).fadeIn(1500);
				$('.toggleFilterDrop').on('click', function () {
					$(this).toggleClass("unFolded");
					$(this).siblings('.dropFilter').slideToggle();
				});
				$('#expendAll').on('click', function (e) {
					e.preventDefault();
					/*					$(this).addClass('filterButtonColor');
                                        setTimeout(() => $(this).removeClass('filterButtonColor'), 300);*/
					var $toggleFilterDrop = $('.toggleFilterDrop');
					$toggleFilterDrop.addClass("unFolded");
					$toggleFilterDrop.siblings('.dropFilter').slideDown();

				});
				$('#minimizeAll').on('click', function (e) {
					e.preventDefault();
					var $toggleFilterDrop = $('.toggleFilterDrop');
					$toggleFilterDrop.removeClass("unFolded");
					$toggleFilterDrop.siblings('.dropFilter').slideUp();
				});
			}

			function tplJQUI() {
                var selectedMinPrice = '{{old('min-price',0)}}';
                var selectedMaxPrice = '{{old('max-price',$max_price??0)}}';
                var maxPrice = '{{$max_price??0}}';
                var minPrice = '{{$min_price??0}}';
				window.oldValues = {
					selectedMinPrice: Number(selectedMinPrice),
					selectedMaxPrice: Number(selectedMaxPrice),
					maxPrice:Number(maxPrice),
					minPrice:Number(minPrice)
				};
				var $sliderRange = $("#slider-range");
				$sliderRange.slider({
					range: true,
					min: window.oldValues['minPrice'],
					max: window.oldValues['maxPrice'],
					values: [window.oldValues['selectedMinPrice'], window.oldValues['selectedMaxPrice']],
					slide: function (event, ui) {
						$("#amountMin").val(ui.values[0]);
						$("#amountMax").val(ui.values[1]);
					}
				});
				$("#amountMin").val($sliderRange.slider("values", 0));
				$("#amountMax").val($sliderRange.slider("values", 1));
			}

			function tplVue() {
				shopAppOBJ.data.selectedCategory = selectedCategory;
				shopAppOBJ.data.selectedSubCategory = selectedSubCategory;
				shopAppOBJ.data.items = items.data;
				shopAppOBJ.data.categoryImgRoute = categoryImgRoute;
				shopAppOBJ.data.itemsAvail = true;
				shopAppOBJ.data.searchText = '{{old('product-search') }}';
			}
    </script>

    <script>


    </script>
    <script id="brandsFilterScript">
			window.addonsJQ.push(function brandsFilter() {
				$('.brandsFilter').find('.hiddenCheckbox').on('change', function (e) {
					$(this).siblings('.customCheckbox').children('img').fadeToggle();
				});
			});
			window.addonsJQ.push(function colorFilter() {
				$('.colorsFilter').find('.hiddenCheckbox').on('change', function (e) {
					$(this).siblings('.customCheckbox').children('img').fadeToggle();
				});
			});
    </script>
    <style>
        .pagination {
            display: grid;
            grid-template-columns: repeat(auto-fill, 72px);
        }

        .page-item.active .page-link {
            background-color: #F44336;
            border-color: #F44336;
            color: white;
        }

        .page-item .page-link {
            color: #F44336;
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
        }

        .pagination li span, .pagination li a {
            padding: 1.2rem;
            text-align: center;
        }

        .orderCateBy {
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex: 1 720px !important;
        }

        .grid-order {
            display: none;
        }

        .sectionA {
            flex: 1 !important;
        }

        /*Material button*/
        /* Material style */
        .materialButton {
            border: none;
            cursor: pointer;
            color: white;
            padding: 15px 0;
            border-radius: 2px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, .4);
            background: #F44336;
            margin: 10px;
            font-size: 12px;
        }

        /* Ripple magic */
        .materialButton {
            position: relative;
            overflow: hidden;
        }

        .materialButton:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, .5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 1;
            }
            20% {
                transform: scale(25, 25);
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: scale(40, 40);
            }
        }

        .materialButton:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        /*!matirial button*/
        /*search bar*/
        .SearchIcon {
            color: #fff;

        }

        .SearchButton {
            background-color: #ED1C24;
            border-radius: 1px;
        }

        .SearchButton:hover {
            background-color: #C4161C;
        }

        .SearchBar {

        }

        /*!search bar*/
        .filtersUl > li {
            border-bottom: 1px solid #e6e6e6;
        }

        #filterActions > span {
            cursor: pointer;
            transition: 0.7s;
        }

        .filterButtonColor {
            background-color: #B70303;
            color: white;
        }

        .brandsFilter input[type="checkbox"] {
            display: none;
        }

        .brandsFilter .customCheckbox {
            border-radius: 2px;
            border-style: solid;
            border-width: 1px;
            border-color: #d8d8d8;
            box-sizing: border-box;
            background-color: #ffffff;
            width: 20px;
            height: 20px;
        }

        .colorsFilter > ul {
            padding: 9px 0;
            display: grid;
            grid-auto-flow: column;
            grid-template-rows: 1fr 1fr;
            grid-gap: 11px;
            grid-auto-columns: 43px;
            height: 115px;
        }

        .colorsFilter input[type="checkbox"] {
            display: none;
        }

        .colorsFilter .customCheckbox {
            border-style: solid;
            border-width: 1px;
            border-color: #d8d8d8;
        }

        .toggleFilterDrop i {
            transition: 0.4s all;
        }

        .unFolded i {
            transform: rotateZ(-90deg);
        }

        .filterUnit {
            padding: 25px 5px;
        }

        @media (min-width: 910px) {
            .filterUnit {
                padding: 25px;
            }
        }

        .filters {
            background-color: #ffffff;
        }

        .SiteRouteWay {
            display: flex;
            padding: 0 21px;
            flex-wrap: wrap;
        }

        .priceRangeFilter {
            padding: 21px;
        }

        .priceRangeFilter .ui-corner-all {
            border-radius: 30px;
        }

        .priceRangeFilter .rangeInputs {
            margin: 5px 10px 25px 5px;
            height: 40px;
            display: inline-flex;
            width: 42%;
            background-color: white;
            color: #989898;
        }

        .priceRangeFilter .rangeInputs input {
            border: 0;
            font-weight: bold;
            color: #0d0d0d;
            width: inherit;
        }

        .priceRangeFilter .rangeInputs strong {
            min-width: 20px;
            display: block;
            padding: 0 6px;
            color: #0d0d0d;
        }

        .priceRangeFilter .ui-slider-handle {
            width: 20px;
            height: 20px;
            top: -5px;
        }

        .hide {
            opacity: 0;
        }

        /*
                .container-1112 {
                    max-width: 1271px;
                }*/

        .categoryPage {
            min-height: 100vh;
        }

        .noItems {
            text-align: center;
            color: grey;
            text-transform: uppercase;
            padding: 30px 10px;
        }

        .catesItem {
            overflow: initial;

        }

        .catesItem > img {
            width: 100%;
        }

        @media (max-width: 710px) {
            .orderCateBy {
                display: grid;
                justify-content: stretch;
            }

            .orderCateBy .SearchBar .SearchButton {
                padding: 1em 0.75em;
            }
        }
    </style>
@endsection
