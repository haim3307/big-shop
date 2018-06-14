@if($navItem->is_core)
    <span class="badge badge-primary allCentered-i" style="{{$style??''}}" title="This page is a Core Page that came built in with the site">Core</span>
@else
    <span class="badge badge-success allCentered-i" style="{{$style??''}}" title="this is a custom page created by your team">Custom</span>
@endif