<div id="side-menu" style="overflow-y: scroll; height: 100vh;"
     class="g-col-sm-2  g-col-md-1  g-col-lg-2 collapse navbar-collapse d-sm-block">
    <h1 style="text-align: inherit;padding: 13px 20px; " class="d-none d-lg-block text-white">Big Shop</h1>
    <hr style="border-top: 1px solid rgba(255,255,255,.1);">

    <ul>
        <li class="link {{ active('cms') }}">
            <a>
                <span class="fa fa-th" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Management Panel</span>
            </a>
        </li>


        <li class="link {{ active('cms/category*') }}">

            <a>
                <span class="fa fa-list-alt" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Categories</span>
                <span class="badge badge-success d-lg-inline-block notification">20</span>
            </a>
            <ul class="collpseableSide" id="collapse-post">
                <li><i></i><a href="{{url('cms/category/create')}}">Create New</a></li>
                <li><i></i><a href="{{url('cms/category/')}}">Watch All Categories</a></li>
            </ul>

        </li>
        <li class="link {{ active('cms/product*') }}">

            <a>
                <span class="fa fa-list-alt" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Products</span>
                <span class="badge badge-success d-lg-inline-block notification">20</span>
            </a>
            <ul class="collpseableSide" id="collapse-post">
                <li><i></i><a href="{{url('cms/product/create')}}">Create New</a></li>
                <li><i></i><a href="{{url('cms/product/')}}">Watch All Products</a></li>
            </ul>

        </li>
        <li class="link {{ active('cms/page*') }}" id="pagesListLink">
            <a>
                <span class="fa fa-list-alt" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Pages</span>
                <span class="badge badge-success d-lg-inline-block notification">20</span>
            </a>
            <ul class="collpseableSide" id="collapse-pages">
                <li>
                    <i></i>
                    <a href="{{url('cms/page/all')}}">All Pages</a>
                </li>
                <li>
                    <i></i>
                    <a href="{{url('cms/page/create')}}">Create New</a>
                </li>
                <li>
                    <span>
                        <i>
                        {{--<div class="led-green" style="position: relative;top: -2px;"></div>--}}
                         </i>
                    <a href="{{url('cms/page/home')}}">Home</a>
                    </span>
                </li>
                @foreach(\App\Page::all() as $navItem)
                    <li class="f-row justify-content-between" title="{{ucwords($navItem->title)}}">
                        <span>
                            <i>
                            {{--<div class="led-green" style="@if($navItem->active)background-color:#F00;@endif position: relative;top: -2px;"></div>--}}
                        </i>
                        <a class="my-text-overflow" href="{{url('cms/page/'.$navItem->url)}}">{{ucwords($navItem->title)}}</a>
                        </span>
                        @include('cms.layouts.inc.is-core-badge')
                    </li>
                @endforeach
            </ul>

        </li>

        <li class="link {{ active('cms/order*') }}">

            <a>
                <span class="fa fa-list-alt" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Orders</span>
                <span class="badge badge-success d-lg-inline-block notification">20</span>
            </a>
            <ul class="collpseableSide" id="collapse-post">
                <li><i></i><a href="{{url('cms/order/')}}">Watch All Orders</a></li>
            </ul>

        </li>
        @if(Auth::user()->isAdministrator())
        <li class="link {{ active('cms/user*') }}">
            <a>
                <span class="fa fa-user" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Users</span>

            </a>
            <ul class="collpseableSide" id="collapse-post">
                <li><i></i><a href="{{url('cms/user/create')}}">Create New</a></li>
                <li><i></i><a href="{{url('cms/user/')}}">Watch All Users</a></li>
            </ul>

        </li>
        @endif

        <li class="link {{ active('cms/tag*') }}">
            <a>
                <span class="fa fa-tag" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Tags</span>
                <span class="badge badge-success d-lg-inline-block notification"
                      style="display: none !important;">10</span>
            </a>
            <ul class="collpseableSide" id="collapse-post">
                <li><i></i><a href="{{url('cms/tag/create')}}">Create New</a></li>
                <li><i></i><a href="{{url('cms/tag/')}}">Watch All Tags</a></li>
            </ul>

        </li>
        <li class="link {{ active('cms/menus*') }}">
            <a href="{{url('cms/menus')}}">
                <span class="fa fa-link" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Menus</span>
            </a>
        </li>
        <li class="link {{ active('cms/link*') }}">
            <a href="{{url('cms/link')}}">
                <span class="fa fa-link" aria-hidden="true"></span>
                <span class="d-lg-inline-block title">Links</span>
            </a>
        </li>
    </ul>
</div>
@push('styles')
    <style>
        .collpseableSide li i {
            width: 30px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        li.link.active{
            background-color: #fff;
        }
    </style>
    <style>
        @media (min-width: 1610px) {
            #side-menu #pagesListLink .collpseableSide a {
                max-width: 8vw;
            }

        }
        @media (min-width: 810px) {
            #side-menu #pagesListLink .collpseableSide a {
                max-width: 5vw;
            }

        }
        #side-menu #pagesListLink .collpseableSide a {
/*            overflow: hidden;
            text-overflow: ellipsis;*/
            white-space: nowrap;
        }
        @media (max-width: 1400px) {
            #side-menu #pagesListLink .collpseableSide li i{
                display: none;
            }

        }
    </style>
@endpush