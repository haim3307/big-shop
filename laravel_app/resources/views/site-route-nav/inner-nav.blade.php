<nav style="display:flex; align-items: center;">
    <img src="{{asset('_img/Home.png')}}" class="homeIcon" alt="">
    <nav class="siteWayNav">
        <span class="siteWay"><a href="{{url('shop')}}">Shop</a></span> <img class="dArrow"
                                                                             src="{{asset('_img/d_arrow.png')}}"
                                                                             alt="">
        @if(isset($category)) <span class="siteWay"><a
                    href="{{url('shop/'.$category->name)}}">{{$category->name}}</a></span>
        @endif
    </nav>
</nav>
