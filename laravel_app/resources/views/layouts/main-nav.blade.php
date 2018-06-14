<nav class="mainNav">
    <ul class="hideMenu" style="flex-wrap: wrap">
        @foreach($menus['main-nav']->items as $item)
            @if($item)
                <li class="{{active($item->title != 'home'?$item->calc_url:[$item->calc_url,'/'],'menuBtnActive')}}"
                    @if($item->title == 'brands') data-board-id="brands" @endif>
                    <a href="{{url($item->calc_url)}}">{{strtoupper($item->title)}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>