<nav class="SiteRouteWay">
    <div class="sectionA">
        @include('site-route-nav.inner-nav')
    </div>
    <div class="orderCateBy">
        @yield('sectionB')
    </div>
    <div class="grid-order">
        @yield('sectionC')
    </div>

</nav>