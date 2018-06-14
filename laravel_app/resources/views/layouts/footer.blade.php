<footer  id="mainFooter">
    {{--    @push('styles')
            <style>
                @media (max-width: 1112px) {
                    .footer-carousel{
                        width: 100vw;
                    }
                }
            </style>
        @endpush
        <style>
            @media (max-width: 1112px) {
                .footer-carousel{
                    width: 100vw;
                }
            }
        </style>--}}
    <div class="container-1112-footer">
        <section class="companiesSlider">
            <div class=" footer-carousel carousel-cell"
                 data-flickity='{ "groupCells": true , "pageDots": false,"contain": true}'
                 style="overflow: hidden; max-width: 100vw;">

                @foreach ($brands as $brandItem)
                    <div class="carousel-cell d-grid align-items-center" style="padding: 37px;min-height: 100px;">
                        <img class="" style="max-height: 50px; " src="{{asset('_img/brands/'.$brandItem['main_img'])}}">
                    </div>
                @endforeach
            </div>

        </section>
        <div class="siteMap grid-items-3">

            <section class="WhoWeAre">
                <h3>Who We Are</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has
                </p>
                <ul>
                    <li><i><img src="{{asset('_img/Flag.png')}}" alt=""></i><span>Address 123, Country</span></li>
                    <li><i><img src="{{asset('_img/iPad.png')}}" alt=""></i><span>(043) 875-9211</span></li>
                    <li><i><img src="{{asset('_img/Mail.png')}}" alt=""></i><span>info@kopasoft.com</span></li>
                </ul>
            </section>
            <section class="Categories">

                <h3>Categories</h3>
                <ul>
                    @for ($x = 0; $x < 15; $x++)
                        <li class="text-capitalize"><a
                                    href="{{isset($allCategories[$x]->url)?url('shop/'.$allCategories[$x]->url):'#'}}"
                                    class="my-text-overflow d-block" style="    white-space: nowrap;
;max-width: 100px;">{{$allCategories[$x]->name??''}}</a></li>
                    @endfor
                </ul>

            </section>
            <section class="Tweets">
                <h3>Latest Tweet</h3>
                <ul>
                    <li><img src="{{asset('_img/twitter.png')}}" alt="">
                        <p>Check out this great #themeforest item for you 'Simpler Landing</p>
                        <small>2 Hours ago</small>
                    </li>
                    <li><img src="{{asset('_img/twitter.png')}}" alt="">
                        <p>Check out this great #themeforest item for you 'Simpler Landing</p>
                        <small>2 Hours ago</small>
                    </li>
                    <li><img src="{{asset('_img/twitter.png')}}" alt="">
                        <p>Check out this great #themeforest item for you 'Simpler Landing</p>
                        <small>2 Hours ago</small>
                    </li>
                </ul>
            </section>
        </div>

    </div>
    <footer>
        <div class="container-1112-footer f-row align-items-center justify-content-center justify-content-md-between">
            <div class="copyRights">Copyrights. © {{date("Y")}} by HTProjects</div>
            <div class="f-row justify-content-center align-items-center">
                <ul class="f-row align-items-center justify-content-center">
                    @foreach ($menus['footer-nav']->items as $item)
                        @if($item)
                            <li>
                                <a href="{{url($item->calc_url)}}">{{ucwords($item->title)}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <a class="backToTop" href=""><img src="{{asset('_img/back%20to%20top.png')}}" alt=""></a>

            </div>
        </div>
    </footer>
</footer>